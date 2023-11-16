<?php

namespace App\Http\Controllers\Shop;

use App\User;
use App\Models\Settings;
use App\Models\Shop\Plan;
use App\Models\Catagories;
use App\Models\Slide\Slide;
use App\Models\Shop\Product;
use App\Models\Shop\Reviews;
use Illuminate\Http\Request;
use App\Models\Shop\Whishlist;
use App\Models\Shop\UpdateDeal;
use App\Models\Shop\OrderProduct;
use App\Models\shop\CatagoriesOnly;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBag;

class ShopController extends Controller
{
    public function index()
    {   
        $list_deal_target = Product::where('is_deal','1')->get();
        $now_time = date('Y-m-d');
        foreach($list_deal_target as $list){
            if($list->deal_target < $now_time)
            {
                $list->is_deal = 0;
                $list->save();
            }        
        }
        // for index min() value set to as index plan 
        $index_deal = Product::where('is_deal','1')->min('id');
        if($index_deal != null){
            $get_deal = Product::find($index_deal);
            $get_deal->deal_index = 1;
            $get_deal->save();

            $assign_other = Product::where([
                ['is_deal', '=', '1'],
                ['id', '!=', $index_deal],
            ])->get();
            foreach($assign_other as $other)
            {
                $other->deal_index = 0;
                $other->save();
            }
        }


        return view('shop',[
        'feature' => Product::where('is_featured','1')->get(),
        'setting' => Settings::first(),
        'product' => Product::all(),
        'slidelist' => Slide::all(),
        'catagories' => Catagories::get(),
        'feature_catagory' => Catagories::where('is_featured','1')->get(),
        'is_deal' => Product::where('is_deal','1')->get(),
        'plan' => Plan::all(),
        'product_discount' => Product::where('product_discount','>=','1')->get(),
        'product_trending' => Product::where('product_trending','=','1')->get(),
        'selected_menu' => Catagories::where('is_menu','=','1')->get(),
        'whishlist' => Whishlist::where('user_id',Auth::id())->get(),
        'index_deal' => $index_deal,
        ]);

        // dd($index_deal);
    }

    public function addToCart($id) {
        $product = Product::findOrFail($id);

        $cart = session()->get('cart', []);
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
            } else {
                $cart[$id] = [
                    "product_id" => $product->id,
                    "product_name" => $product->product_name,
                    "price" => $product->product_logical_price,
                    "image" => $product->main_image,
                    "quantity" => 1,
                    ];
                    }
                    session()->put('cart', $cart);
                    
        return redirect()->back()->with('message', 'Product added to cart');
    }

    public function remove(Request $request)
    {
// dd($request->all());
        if($request->id){
            $cart = session()->get('cart');
            if ($cart == true && isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('message', 'Product successfully removed');
            // return redirect()->back()->with('message', 'Product added to cart');
        }
    }

     public function update(Request $request)
    {
       if($request->id && $request->quantity){
        $cart = session()->get('cart');
        ($cart[$request->id]["quantity"] = $request->quantity);
        session()->put('cart', $cart);
        session()->flash('message', 'Quantity updated successfully!');
        
       } 
  
    }

    public function whishList(Request $request){
    
        if($request->pro_whish){
                $whishlist= new Whishlist;
                $whishlist->user_id = Auth::id();
                $whishlist->product_id = $request->pro_whish;
                $whishlist->save();
            
                return redirect()->back()->with('message', 'Product added to Whishlist');

        }elseif($request->pro_unwhish){
                $get_product_whishlisted = Whishlist::where('user_id',Auth::id())
                ->where('product_id',$request->pro_unwhish)->delete();
                return redirect()->back()->with('message', 'Product removed from Whishlist');
        }
        else
        {
            return redirect()->back()->with('message', 'Whoops try again');
        }

    }

    public function search(Request $request)
    {
        if($request->ajax() != null)
            {
                $output="";
                $products=product::where('product_name','LIKE','%'.$request->search."%")->get();
                if($products)
                {
                    foreach ($products as $key => $product) 
                    {
                        // $output.='<p>'.
                        // '<b style="color:black;">'.$product->product_name.'</b>'.'&nbsp;'.
                        // '<small class="float:right">'.$product->product_catagories.'</small>'.
                        // '</p>';

                        $output.='<a class="search_text" href="product_details?pro='.$product->id.'">'.'<b>'.$product->product_name.'</b>'.'</a>'.'<br>';
                    }
                    return Response($output);
                }
            }elseif($request->ajax() == null)
            {
                return Response("Search for products");
            }
    }

    public function review(Request $request){
         $validated = $request->validate([
            'product_id' => ['min:1'],
            'review' => ['min:3'],
            'rating' => 'nullable',
        ]);

       if($validated['product_id'] != null)
       {
        $review = new Reviews();
        $review->user_id = Auth::id();
        $review->reviewer_user_name = auth()->user()->name;
        $review->product_id = $validated['product_id'];
        $review->review = $validated['review'];
        $review->rated = $validated['rating'];
        $review->save();
        return redirect()->back()->with('message','Thank you for your valuable feedback.');

       }else
       {

       return redirect()->back()->with('message','Whoops, something happen try again ');

       }
       
    }
    public function product_list(){

        return view('products',[
            'product' => Product::all(),
            'setting' => Settings::first(),
            'catagories' => Catagories::get(),
        ]);
    }
}