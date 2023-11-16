<?php

namespace App\Http\Controllers\Admin;

use App\Models\Shop\OrderProduct;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function index(){
        return view('admin.orders.index',
          [
         'count' => OrderProduct::where('status', '=', 'paid')->count(),
         'orders' => OrderProduct::latest()->SimplePaginate(5),
         'orders_unique' => OrderProduct::distinct('session_id')->get()
          ] 
        );
    }

    public function destroy(OrderProduct $order){
        $order->delete();
    return to_route('admin.orders.index')->with('message', 'Product Deleted');
    }
}