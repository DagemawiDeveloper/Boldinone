<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Shop\Product;
use Illuminate\Http\Request;

class ShopdetailsController extends Controller
{
    public function index(){
        
        return view('shopdetails');
    }
    
    
}
