<?php

namespace App\Http\Controllers\Shop;

use App\Models\Settings;
use App\Models\Catagories;
use App\Models\Shop\Product;
use App\Models\Shop\Reviews;
use Illuminate\Http\Request;
use App\Models\Shop\Whishlist;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProductDetailsController extends Controller
{
    public function index() {
        return view('product_details',[
            'catagories' => Catagories::get(),
            'selected_menu' => Catagories::where('is_menu','=','1')->get(),
            'setting' => Settings::first(),
        ]);
    }

    public function show(Request $request){
        $product = $request->pro;
        return view('product_details',[
         'catagories' => Catagories::get()->take(10),
         'selected_menu' => Catagories::where('is_menu','=','1')->get()->take(6),
         'setting' => Settings::first(),
         'products' => Product::where('id','=',$product)->get(),
         'whishlist' => Whishlist::where('user_id',Auth::id())->get(),
         'reviews' => Reviews::where('product_id',$product)->get(),

        ]);
    }
}