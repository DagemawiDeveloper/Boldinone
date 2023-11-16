<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Catagories;
use App\Models\Settings;
use App\Models\Shop\OrderProduct;
use App\Models\Shop\Product;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index(){
       $count = OrderProduct::where('status', '=', 'paid')->count();
       $list_setting = Settings::all();
       $catagories = Catagories::all();
       return view('admin.settings.index', compact('list_setting', 'count', 'catagories'));
    }
   
    
    public function edit(Settings $setting)
    {
        $count = OrderProduct::where('status', '=', 'paid')->count();
        $setting_detail = Settings::all();
        $catagories = Catagories::all();
        return view('admin.settings.edit', compact('setting', 'setting_detail', 'count', 'catagories'));
    }
    
    public function update(Request $request, Settings $setting) 
    {

        $validated = $request->validate([
            'webname'  => ['min:3'],
            'email'    => ['min:3'],
            'address1' => ['min:3'],
            'address2' => ['min:3'],
            'about'    => ['min:3'],
            'currency' => ['min:1'],
            'phone'    => ['min:3'],
            'right_advert_des'    => 'nullable',
            'left_advert_des'     => 'nullable',
            'big_banner_feature'  => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:width=1400,height=285',
            'deals_background'    => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:width=1903,height=470',
            'right_advert'        => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:width=685,height=285',
            'left_advert'         => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:width=685,height=285',
            'feature_left_advert' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:width=685,height=285',
            'feature_right_advert'=> 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:width=685,height=285',
            'feature_left_des'    => 'nullable',
            'feature_right_des'   => 'nullable',
            'feature_left_target' => 'nullable',
            'feature_right_target'=> 'nullable',
            'left_advert_target'  => 'nullable',
            'right_advert_target' => 'nullable',

        ]);
        if($request->hasFile('big_banner_feature')){
            //get filename with extension
            $validated['big_banner_feature'] = $request->file('big_banner_feature')->store('offer_image', 'public');
        }
        if($request->hasFile('deals_background')){
            //get filename with extension
            $validated['deals_background'] = $request->file('deals_background')->store('offer_image', 'public');
        }
        if($request->hasFile('right_advert')){
            //get filename with extension
            $validated['right_advert'] = $request->file('right_advert')->store('offer_image', 'public');
        }
        if($request->hasFile('left_advert')){
            //get filename with extension
            $validated['left_advert'] = $request->file('left_advert')->store('offer_image', 'public');
        }
        if($request->hasFile('feature_right_advert')){
            //get filename with extension
            $validated['feature_right_advert'] = $request->file('feature_right_advert')->store('offer_image', 'public');
        }
        if($request->hasFile('feature_left_advert')){
            //get filename with extension
            $validated['feature_left_advert'] = $request->file('feature_left_advert')->store('offer_image', 'public');
        }
        $setting->update($validated);
        // dd($validated);
        
        return to_route('admin.settings.index')->with('message', 'Setting Updated');
    }

        public function searchproducts(Request $request){
        // dd(request()->route()->named('admin.products.*'));
            if($request->ajax() != null)
                { 
                    $output="";
                    $products=product::where('product_name','LIKE',"%".$request->search."%")->get();
                    if($products)
                    {
                        foreach ($products as $key => $product) 
                        {
                            // $output.='<p>'.
                            // '<b style="color:black;">'.$product->product_name.'</b>'.'&nbsp;'.
                            // '<small class="float:right">'.$product->product_catagories.'</small>'.
                            // '</p>';
                            
                            $output.='<a class="search_text" href="products/'.$product->id.'/edit">'.'<b>'.$product->product_name.'</b>'.'</a>'.'<br>';
                        }
                        return Response($output);
                    }
                }         
       }

    public function searchorders(Request $request){
      
            if($request->ajax() != null)
                {
                    $output="";
                    $orders=OrderProduct::where('firstname','LIKE',"%".$request->search."%")->get();
                    if($orders)
                    {
                        foreach ($orders as $key => $order) 
                        {
                            // $output.='<p>'.
                            // '<b style="color:black;">'.$product->product_name.'</b>'.'&nbsp;'.
                            // '<small class="float:right">'.$product->product_catagories.'</small>'.
                            // '</p>';
                            
                            $output.='<a class="search_text" href="admin.products.edit?'.$order->id.'">'.'<b>'.$order->firstname.'</b>'.'&nbsp;'.'<b>'.$order->lastname.'</b>'.'<span class="search_type">'.$order->created_at.'</span>'.'</a>'.'<br>';
                        }
                        return Response($output);
                    }
                }
    }

        public function searchcategories(Request $request){
      
            if($request->ajax() != null)
                {
                    $output="";
                    $categories=Catagories::where('catagory_name','LIKE',"%".$request->search."%")->get();
                    if($categories)
                    {
                        foreach ($categories as $key => $category) 
                        {
                            // $output.='<p>'.
                            // '<b style="color:black;">'.$product->product_name.'</b>'.'&nbsp;'.
                            // '<small class="float:right">'.$product->product_catagories.'</small>'.
                            // '</p>';
                            
                            $output.='<a class="search_text" href="admin.products.edit?'.$category->id.'">'.'<b>'.$category->catagory_name.'</b>'.'</a>'.'<br>';
                        }
                        dd($output);
                        // return Response($output);
                    }
                }
    }
}