<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Shop\Product;
use App\Models\Settings;
use Illuminate\Http\Request;

class ShoplistController extends Controller
{
    public function index(){

        return view('shoplist', [
          'product_latest' => Product::latest()->where('product_available', '=', 'instock')
                                               ->where('product_quantity', '>', 2)->get(),
          'product' => Product::latest()->SimplePaginate(6),
          'setting' => Settings::first(),
          'productall' => Product::where('product_available', '=', 'instock')
                                        ->where('product_quantity', '>', 2)->get()
        ] );
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
                    "price" => $product->product_price,
                    "image" => $product->main_image,
                    "quantity" => 1,
                    ];
                    }
                    session()->put('cart', $cart);
                    
        return redirect()->back()->with('message', 'Product added to cart');
    }
    
    
    public function shopdetailcontrol($id){
        $setting = Settings::first();
        if ($id):
            $productdetail = Product::find($id);
            return view('shopdetails', [
                'productdetail' => $productdetail,
                'setting' => $setting
                
                ]);
        else:
            return view('shoplist');
        endif;
            
    }
    
    
}