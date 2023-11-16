<?php

namespace App\Http\Controllers\Shop;

use App\Models\Shop\Plan;
use App\Models\Shop\Product;
use Illuminate\Http\Request;
use App\Models\Shop\OrderProduct;
use App\Http\Controllers\Controller;

class PlansController extends Controller
{
 public function index() {

    return view('admin.plans.index', [
        'count' => OrderProduct::where('status', '=', 'paid')->count(),
        'product' => Product::where('is_deal','=', 1)->get(),
        'products'=> Product::latest()->SimplePaginate(9),
        'plan' => Plan::latest()->SimplePaginate(9),
    ]);

   }
    public function create() {
        return view('admin.plans.create', [
           'count' => OrderProduct::where('status', '=', 'paid')->count(),
        ]);
    }

    public function store(Request $request){
        $validated = $request->validate([
            'plan_name' => ['min:3'],
            'plan_target_date' => ['min:3'],
            'plan_start_date' => ['min:3'],

        ]);
        Plan::create($validated);
        
        return to_route('admin.plans.index')->with('message', 'New plan Added');
    }

    public function edit(Plan $plan) {
        return view('admin.plans.edit', [
           'count' => OrderProduct::where('status', '=', 'paid')->count(),
           'plans' => $plan,
        ]);
    }

    public function update(Request $request, Plan $plan) {
        $validated = $request->validate([
            'plan_name' => ['min:3'],
            'plan_target_date' => ['min:3'],
            'plan_start_date' => ['min:3'],

        ]);
        $plan->update($validated);
        
        return to_route('admin.plans.index')->with('message', 'New plan Updated');
    }

    public function destroy(Plan $plan){

    $plan->delete();

    return to_route('admin.plans.index')->with('message', 'Plan Deleted');

    }
}