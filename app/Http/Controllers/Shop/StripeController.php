<?php

namespace App\Http\Controllers\shop;

use Auth;
// use User;
use Stripe\Stripe;
use App\Models\Shop\Balance;
use App\Models\Shop\Product;
use Illuminate\Http\Request;
use Stripe\Checkout\Session;
use App\Models\Shop\OrderProduct;
use App\Models\User;
use Symfony\Component\Mime\Email;


use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use function PHPUnit\Framework\throwException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class StripeController extends Controller
{
    public function session(Request $request){
        $productItems = [];
        $user_data = User::where('id','=',Auth::id())->first();

        // Set your secret key: remember to change this to your live secret key in production
         \Stripe\Stripe::setApiKey(config('stripe.sk'));

         foreach (session('cart') as $id => $details){
            $product_id = $id;
            $product_name = $details['product_name'];
            $total = $details['price'];
            $quantity = $details['quantity'];
            $two0 = "00";
            $unit_amount = "$total$two0";

            $productItems[] = [
                 
                'price_data' => [
                    'product_data' => [
                        'name' => $product_name,
                    ],
                    'currency' => 'USD',
                    'unit_amount' => $unit_amount,
                ],
                'quantity' => $quantity

            ];
         }
           
         $checkoutSession = \Stripe\Checkout\Session::create([
            'line_items'             => [$productItems],
            'mode'                   => 'payment',
            'allow_promotion_codes'  =>  false,
            'metadata'               =>  [
                'user_id'   => "0001"
            ],
            'customer_email' => $user_data->email,
            'success_url'    => route('customers.success', [], true) . "?session_id={CHECKOUT_SESSION_ID}",
            'cancel_url'     => route('shop', [], true),
        ]);
        foreach (session('cart') as $id => $details){
                $order = new OrderProduct();
                $order->product_id = $id;
                $order->product_name = $details['product_name'];
                $order->order_quantity = $details['quantity'];
                $order->firstname = $user_data->name;
                $order->lastname = $user_data->lastname;
                $order->email = $user_data->email;
                $order->address = $user_data->address;
                $order->status = 'unpaid';
                $order->each_price = $details['price'];
                $order->total_price = $unit_amount;
                $order->session_id = $checkoutSession->id;
                $order->user_id = Auth::id();
                $order->save(); 
        }
        return redirect()->away($checkoutSession->url);
        // dd($checkoutSession);

        
    }

    public function success(Request $request){
        // Set your secret key: remember to change this to your live secret key in production
         \Stripe\Stripe::setApiKey(config('stripe.sk'));
          $sessionId = $request->get('session_id');
          
           try{

                $session = \Stripe\Checkout\Session::retrieve($sessionId);

                if(!$session){

                    throw new NotFoundHttpException; 
                }
                // $customer = \Stripe\Customer::retrieve($session->customer);
                
                $order = OrderProduct::where('session_id', $session->id)->first();
                $success = OrderProduct::where('session_id', $session->id)->get();
                if (!$order) {

                    throw new NotFoundHttpException();
                }
                 if ($order->status === 'unpaid'){
                        $order->status = 'paid';
                        $order->save();
                }
               return view('shop.success', compact('success', 'order'));

                //send email to customer
                // Mail::to("$customer->email")->queue((new PaymentConfirmationEmail())->onQueue("emails
                // "));

             } catch(\Exception $e){
                throw new NotFoundHttpException();
            }
    }

    public function cancel(){
        return view('/');
    }

    public function webhook(){

        // This is your Stripe CLI webhook secret for testing your endpoint locally.
        $endpoint_secret = env('STRIPE_WEBHOOK_KEY');

        $payload = @file_get_contents('php://input');
        $sig_header = $_SERVER['HTTP_STRIPE_SIGNATURE'];
        $event = null;
        //for retrive balance
        $stripe = new \Stripe\StripeClient(config('stripe.sk'));
        $stripe->balance->retrieve([]);

        try {
            $event = \Stripe\Webhook::constructEvent(
            $payload, $sig_header, $endpoint_secret
            );
        } catch(\UnexpectedValueException $e) {
            // Invalid payload
            return response('', 400);
        } catch(\Stripe\Exception\SignatureVerificationException $e) {
            // Invalid signature
            return response('', 400);
        }

        // Handle the event
        switch ($event->type) {
             case 'checkout.session.completed':
                $session = $event->data->object;
                $order = OrderProduct::where('session_id', $session->id)->get();
                // if ($order && $order->status === 'unpaid') {
                //     $order->status = 'paid';
                //     $order->save();
                //     // Send email to customer
                // }
                foreach($order as $orders){
                    if ($orders && $orders->status === 'unpaid'){
                        $orders->status = 'paid';
                        $orders->save();
                    }
                }

                foreach($order as $orders){
                    if ($orders && $orders->status === 'paid'){
                        DB::table("products")->where(['id' => $orders->product_id])
                        ->decrement('product_quantity',$orders->order_quantity);
                    }
                }
                
                break;
                case 'balance.available':
                  $id_balance = 8;
                  $balance = $event->data->object;
                  $balance_tbl = Balance::first();
                  $balance_tbl->available_amount = $balance->available[0]->amount;
                  $balance_tbl->available_currency = $balance->available[0]->currency;
                  $balance_tbl->available_card = $balance->available[0]->source_types->card;
                  $balance_tbl->pending_amount = $balance->pending[0]->amount;
                  $balance_tbl->pending_currency = $balance->pending[0]->currency;
                  $balance_tbl->pending_card = $balance->pending[0]->source_types->card;
                  $balance_tbl->save();

                break;

                // handle other events
                default:
                echo 'Received unknown event type' . $event->type; 
        }

        return response(400);

        }

}