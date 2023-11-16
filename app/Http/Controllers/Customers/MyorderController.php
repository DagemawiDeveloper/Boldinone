<?php

namespace App\Http\Controllers\Customers;

use Illuminate\Http\Request;
use App\Models\Shop\OrderProduct;
use App\Models\Shop\Reviews;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MyorderController extends Controller
{
    public function index() {
        $orders = OrderProduct::where('user_id',Auth::id())->get();
        return view('customers.myorder', compact('orders'));
    }
}