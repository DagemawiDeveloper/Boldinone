<?php

namespace App\Http\Controllers\Shop;

use App\Models\Settings;
use App\Models\Catagories;
use App\Models\Shop\Product;
use Illuminate\Http\Request;
use App\Models\Shop\Whishlist;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class FilterCatagoriesController extends Controller
{
    public function index() {
            return view('FilterCatagories', [
            'catagories' => Catagories::get(),
            'selected_menu' => Catagories::where('is_menu','=','1')->get(),
            'setting' => Settings::first(),
            'whishlist' => Whishlist::where('user_id',Auth::id())->get(),
        ]); 
    }

    public function show(Request $request){
        if($request->cata){
            $catagory = $request->cata;
            return view('FilterCatagories', [
                'catagories' => Catagories::get(),
                'selected_menu' => Catagories::where('is_menu','=','1')->get(),
                'setting' => Settings::first(),
                'products' => Product::where('product_catagories','=',$catagory)->get(),
                'whishlist' => Whishlist::where('user_id',Auth::id())->get(),
            ]);
        }elseif($request->all){

            return view('FilterCatagories', [
                'catagories' => Catagories::get(),
                'selected_menu' => Catagories::where('is_menu','=','1')->get(),
                'setting' => Settings::first(),
                'products' => Product::all(),
                'whishlist' => Whishlist::where('user_id',Auth::id())->get(),
            ]);
        }elseif($request->feature){

            return view('FilterCatagories', [
                'catagories' => Catagories::get(),
                'selected_menu' => Catagories::where('is_menu','=','1')->get(),
                'setting' => Settings::first(),
                'products' => Product::where('is_featured','=','1')->get(),
                'whishlist' => Whishlist::where('user_id',Auth::id())->get(),
            ]);

        }elseif($request->search != null && $request->search_catagory != null){

            return view('FilterCatagories', [
                'catagories' => Catagories::get(),
                'selected_menu' => Catagories::where('is_menu','=','1')->get(),
                'setting' => Settings::first(),
                'products' => product::where('product_name','LIKE','%'.$request->search."%")->where('product_catagories',$request->search_catagory)->get(),
                'whishlist' => Whishlist::where('user_id',Auth::id())->get(),
            ]);
        }
        elseif($request->whishlist != null){
            return view('FilterCatagories', [
                'catagories' => Catagories::get(),
                'selected_menu' => Catagories::where('is_menu','=','1')->get(),
                'setting' => Settings::first(),
                'products' => Whishlist::where('user_id',Auth::id())->get(),
                'whishlist' => Whishlist::where('user_id',Auth::id())->get(),
            ]);
        }else{

        return redirect()->back()->with('error','sorry');
        }
    }

        public function sortProduct(Request $request) {
        if($request->sort != null){
           $sort = $request->sort;
           $catagory = $request->cata;
        }else
        {
            $catagory = $request->cata;
           return view('FilterCatagories', [
                'catagories' => Catagories::get(),
                'selected_menu' => Catagories::where('is_menu','=','1')->get(),
                'setting' => Settings::first(),
                'products' => Product::where('product_catagories','=',$catagory)->paginate(4),
                'count_catagory' => count(Product::where('product_catagories','=',$catagory)->get()),
                'whishlist' => Whishlist::where('user_id',Auth::id())->get(),
           ]);
        }

        if($sort == 'priceAsc'){
            $products = Product::where(['product_available'=>'instock', 'product_catagories'=>$catagory])->orderBy('product_price','ASC')->paginate(4);
        }elseif ($sort == 'priceDesc'){
            $products = Product::where(['product_available'=>'instock', 'product_catagories'=>$catagory])->orderBy('product_price','DESC')->paginate(4);
        }else{
            $products = Product::where(['product_available'=>'instock', 'product_catagories'=>$catagory])->latest()->paginate(4);
        }
        if($request->ajax()){
            $view = view('FilterCatagories', compact('products'))->render();
            return response()->json(['html'=>$view]);
        }
        return view('FilterCatagories', [
            'products' => $products,
            'catagories' => Catagories::get(),
            'selected_menu' => Catagories::where('is_menu','=','1')->get(),
            'setting' => Settings::first(),
            'count_catagory' => count(Product::where('product_catagories','=',$catagory)->get()),
            'whishlist' => Whishlist::where('user_id',Auth::id())->get(),
        ]);

    }

}