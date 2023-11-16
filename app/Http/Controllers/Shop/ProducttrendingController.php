<?php

namespace App\Http\Controllers\Shop;

use App\Models\Settings;
use App\Models\Catagories;
use App\Models\Shop\Product;
use Illuminate\Http\Request;
use App\Models\Shop\Whishlist;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class ProducttrendingController extends Controller
{
    public function index(){         
        return view('product_trending',[
     
        // $top_products = \App\Models\Product::where('is_active',1)->orderByDesc("id")->take(5
        // )->get();
        'catagories' => Catagories::get(),
        'selected_menu' => Catagories::where('is_menu','=','1')->get(),
        'setting' => Settings::first(),
        'products' => Product::where('product_trending','=','1')->paginate(4),
        'count_trending' => count(Product::where('product_trending','=','1')->get()),
        'whishlist' => Whishlist::where('user_id',Auth::id())->get(),
        ]);
    
    }

    public function sortProduct(Request $request) {
        if($request->sort != null){
           $sort = $request->sort;
        }else
        {
           return view('product_trending', [
                'catagories' => Catagories::get(),
                'selected_menu' => Catagories::where('is_menu','=','1')->get(),
                'setting' => Settings::first(),
                'products' => Product::where('product_trending','=','1')->paginate(4),
                'count_trending' => count(Product::where('product_trending','=','1')->get()),
                'whishlist' => Whishlist::where('user_id',Auth::id())->get(),
           ]);
        }

        if($sort == 'priceAsc'){
            $products = Product::where(['product_available'=>'instock', 'product_trending'=>1])->orderBy('product_price','ASC')->paginate(4);
        }elseif ($sort == 'priceDesc'){
            $products = Product::where(['product_available'=>'instock', 'product_trending'=>1])->orderBy('product_price','DESC')->paginate(4);
        }else{
            $products = Product::where(['product_available'=>'instock', 'product_trending'=>1])->latest()->paginate(4);
        }
        if($request->ajax()){
            $view = view('product_trending', compact('products'))->render();
            return response()->json(['html'=>$view]);
        }
        return view('product_trending', [
            'products' => $products,
            'catagories' => Catagories::get(),
            'selected_menu' => Catagories::where('is_menu','=','1')->get(),
            'setting' => Settings::first(),
            'count_trending' => count(Product::where('product_trending','=','1')->get()),
            'whishlist' => Whishlist::where('user_id',Auth::id())->get(),
        ]);

    }
    
}