<?php

namespace App\Http\Controllers\Shop;

use App\Models\Shop\Plan;
use App\Models\Catagories;
use App\Models\Shop\Product;
use Illuminate\Http\Request;
use App\Models\Shop\OrderProduct;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{

    public function index()
    {   
        // $list_products = Product::all();
        return view('admin.products.index',  [
         'count' => OrderProduct::where('status', '=', 'paid')->count(),
         'list_products' => Product::latest()->SimplePaginate(9),
         'deals' => Product::where('is_deal','=', 1)->get(),
         'plan' => Plan::all(),
         
        ] );
    }

    public function create()
    {
        $now = date('Y-m-d');
        return view('admin.products.create',[
        'count' => OrderProduct::where('status', '=', 'paid')->count(),
        'catagories' => Catagories::all(),
        'plan' => Plan::where('plan_target_date','>', $now)->get(),
        ]);
    }

    Public function store(Request $request) {
        // dd($request->all());

        $validated = $request->validate([
            'product_name' => ['min:1'],
            'product_catagories' => ['min:1'],
            'product_description' => ['min:1'],
            'product_specification' => ['min:1'],
            'product_long_description' => ['min:1'],
            'product_list_by' => ['min:1'],
            'product_price' => ['min:1'],
            'product_discount' => 'nullable',
            'product_quantity' => ['min:1'],
            'product_logical_price' => 'nullable',
            'product_brand' => ['min:1'],
            'product_available' => ['min:1'],
            'product_trending'=> ['min:1'],
            // 'plan_id' => 'nullable',
            'is_featured' => 'nullable',
            'main_image'   => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:width=500,height=333',
            'big_image'    => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:width=500,height=333',
            'big_image1'   => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:width=500,height=333',
            'big_image2'   => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:width=500,height=333',
        ]);
        
        if($request->product_discount != null){
            if($request->product_price != null && $request->product_discount != 0){
               $percentage = $request->product_discount / 100 * $request->product_price;
               $product_logical_price = $request->product_price - $percentage;
               $validated['product_logical_price'] = $product_logical_price;
            //    dd($product_logical_price);
            }
        }
        elseif($request->product_discount == null){
            if($request->product_price != null)
                {
                   $product_logical_price = 100 / 100 * $request->product_price;
                   $validated['product_logical_price'] = $product_logical_price;
                    // dd($product_logical_price);
                }
        }
        elseif($request->product_discount == 0){
            if($request->product_price != null)
                {
                   $product_logical_price = 100 / 100 * $request->product_price;
                   $validated['product_logical_price'] = $product_logical_price;
                    // dd($product_logical_price);
                }
        }

        //  thumbnail of the product
        if($request->hasFile('main_image')){
            //get filename with extension
            $validated['main_image'] = $request->file('main_image')->store('products_image', 'public');
        }

        // big dispaly image start here
        if($request->hasFile('big_image')){
            //get filename with extension
            $validated['big_image'] = $request->file('big_image')->store('products_image', 'public');
        }

        if($request->hasFile('big_image1')){
            //get filename with extension
            $validated['big_image1'] = $request->file('big_image1')->store('products_image', 'public');
        }

        if($request->hasFile('big_image2')){
            //get filename with extension
            $validated['big_image2'] = $request->file('big_image2')->store('products_image', 'public');
        }
        //big display image end here

        Product::create($validated);
        // dd($validated);
        
        return to_route('admin.products.index')->with('message', 'New product Added');

    }

    public function edit(Product $product)
    {
        $now = date('Y-m-d');
        $count = OrderProduct::where('status', '=', 'paid')->count();
        $catagories = Catagories::all();
        $plans = Plan::where('plan_target_date','>',$now)->get();
        return view('admin.products.edit', compact('product', 'catagories', 'count', 'plans'));
    }
    public function update(Request $request, Product $product) {

        if($request->plan_id){
            $plan = Plan::where('id',$request->plan_id)->get();
            foreach ($plan as $plans){
                $product->deal_name = $plans->plan_name;
                $product->save();
                $product->deal_target = $plans->plan_target_date;
                $product->save();
            }
        }

        if($request->product_discount != null){
            if($request->product_price != null && $request->product_discount != 0){
               $percentage = $request->product_discount / 100 * $request->product_price;
               $product->product_logical_price = $request->product_price - $percentage;
               $product->save();
            //    dd($product);
            }
        }
        elseif($request->product_discount == null){
            if($request->product_price != null)
                {
                   $product->product_logical_price = 100 / 100 * $request->product_price;
                   $product->save();
                    // dd($product->product_logical_price);
                }
        }
        elseif($request->product_discount == 0){
            if($request->product_price != null)
                {
                   $product->product_logical_price = 100 / 100 * $request->product_price;
                   $product->save();
                }
        }

        $validated = $request->validate([

            'product_name' => ['min:1'],
            'product_catagories' => ['min:1'],
            'product_description' => ['min:1'],
            'product_specification' => ['min:1'],
            'product_long_description' => ['min:1'],
            'product_list_by'   => ['min:1'],
            'product_price'     => ['min:1'],
            'product_discount'  => 'nullable',
            'product_quantity'  => ['min:1'],
            'product_brand'     => ['min:1'],
            'product_available' => ['min:1'],
            'product_trending'  => ['min:1'],
            'plan_id' => 'nullable',
            'is_featured'  => 'nullable',
            'main_image'   => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:width=500,height=333',
            'big_image'    => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:width=500,height=333',
            'big_image1'   => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:width=500,height=333',
            'big_image2'   => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:width=500,height=333',   
            
        ]);

        if($request->hasFile('main_image')){
            //get filename with extension
            $validated['main_image'] = $request->file('main_image')->store('products_image', 'public');
        }
        if($request->hasFile('big_image')){
            //get filename with extension
            $validated['big_image'] = $request->file('big_image')->store('products_image', 'public');
        }
        if($request->hasFile('big_image1')){
            //get filename with extension
            $validated['big_image1'] = $request->file('big_image1')->store('products_image', 'public');
        }
        if($request->hasFile('big_image2')){
            //get filename with extension
            $validated['big_image2'] = $request->file('big_image2')->store('products_image', 'public');
        }

        // dd($request->product_discount);
        $product->update($validated);
        
        return to_route('admin.products.index')->with('message', 'Product Updated');

    }

    public function dealupdate(Request $request, Product $product)
    {
        if($request->upd){
            $id = $request->upd;
            $now = date('Y-m-d');
            $product = Product::where('id', $id)->get();
                foreach($product as $pro){
                    //check if the deal target is expired
                    if($now <= $pro->deal_target){
                        //update is_deal
                        if($pro && $pro->is_deal === 0 ){
                            $pro->is_deal = 1;
                            $pro->save();
                        }else{
                             return to_route('admin.products.index')->with('message', 'Already the product is Published');
                            }
                    }else{
                        return to_route('admin.products.index')->with('message', 'Product "deal target" is expired. you have to update "deal target" first');
                    }
                };

            return to_route('admin.products.index')->with('message', 'Product Deal Published');
        }
        
        
     }

     public function dealdisable(Request $request, Product $product)
    {

        if($request->dis){
            $id = $request->dis;
            $product = Product::where('id', $id)->get();
                foreach($product as $pro){
                    if($pro && $pro->is_deal === 1){
                        $pro->is_deal = 0;
                        $pro->save();
                    }else{
                         return to_route('admin.products.index')->with('message', 'Already product Disabled');
 
                    }
                };

            return to_route('admin.products.index')->with('message', 'Product Deal Disabled');
        }
        
        
     }
    public function destroy(Product $product){

    $product->delete();
    return to_route('admin.products.index')->with('message', 'Product Deleted');

    }
}