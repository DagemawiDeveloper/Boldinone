<?php

namespace App\Http\Controllers\Shop;

use App\Models\Settings;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Shop\Product;

class ServiceController extends Controller
{
        public function index(){
        $setting = Settings::first();
        $products = Product::all();
        return view('service',[
            'setting'=> $setting,
            'products'=> $products,
        ]);
    }
}