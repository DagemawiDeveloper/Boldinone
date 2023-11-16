<?php

namespace App\Http\Controllers\Shop;

use App\Models\Catagories;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShopCategoriesController extends Controller
{
        public function index(){
        $catagories = Catagories::all();
        return view('shop', compact('catagories'));
    }
}