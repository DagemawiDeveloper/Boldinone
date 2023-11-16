<?php

namespace App\Http\Controllers\Admin;

use App\Models\Catagories;
use App\Models\Shop\OrderProduct;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CatagoriesAdminController extends Controller
{
    public function index(){
        return view('admin.catagories.index',[
        'catagories' => Catagories::all(),
        'subcatagories' => Catagories::where('status','1')->get(),
        'count' => OrderProduct::where('status', '=', 'paid')->count(),
        ]);
    }

    public function create()
    {
        $catagories = Catagories::all();
        $count = OrderProduct::where('status', '=', 'paid')->count();
        // $catagories = Catagories::whereNull('catagory_id')->get();
        return view('admin.catagories.create', compact('catagories', 'count'));
    }

     Public function store(Request $request) {

        $validated = $request->validate([
            'catagory_name' => ['min:3'],
            'catagory_image' => ['min:3'],
            'service_list_by' => ['min:3'],
            
        ]);
            if($request->hasFile('catagory_image')){
            //get filename with extension
            $validated['catagory_image'] = $request->file('catagory_image')->store('CatagoryImage', 'public');
        }
        Catagories::create($validated);
        
        return to_route('admin.catagories.index')->with('message', 'New Catagorie Added');

    }

    public function edit(Catagories $catagory)
    {
        $catagories = Catagories::all();
        $count = OrderProduct::where('status', '=', 'paid')->count();
        // $catagories = Catagories::whereNull('catagory_id')->get();
        return view('admin.catagories.edit', compact('catagory', 'catagories', 'count'));
    }
    public function update(Request $request, Catagories $catagory) {

        $validated = $request->validate([
            'catagory_id' => ['min:1'],
            'catagory_name' => ['min:3'],
            'catagory_image' => ['min:3'],
            'service_list_by' => ['min:3'],
            'ad_banner' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:width=279,height=340',
        ]);
        if($request->hasFile('catagory_image')){
            //get filename with extension
            $validated['catagory_image'] = $request->file('catagory_image')->store('catagories_image', 'public');
        }

        if($request->hasFile('ad_banner')){
            //get filename with extension
            $validated['ad_banner'] = $request->file('ad_banner')->store('catagories_ad_banner', 'public');
        }
        
        $catagory->update($validated);
        
        return to_route('admin.catagories.index')->with('message', 'Catagories Updated');
    }

    public function changeStatus(Request $request)

    {
         if($request->act){
            $Catagories = Catagories::where('id',$request->act)->get();
                foreach($Catagories as $cata){
                        //update is_featured
                        if($cata && $cata->is_featured === 0){
                            $cata->is_featured = 1;
                            $cata->save();
                        }
                    }
                    return to_route('admin.catagories.index')->with('message', 'Catagory now published as Featured items');
                };
        if($request->dis){
            $Catagories = Catagories::where('id',$request->dis)->get();
                foreach($Catagories as $cata){
                        //update is_featured
                        if($cata && $cata->is_featured === 1){
                            $cata->is_featured = 0;
                            $cata->save();
                        }
                    }
                    return to_route('admin.catagories.index')->with('message', 'Catagory featured is disabled');
                };
            
        return to_route('admin.catagories.index')->with('message', 'Try Again');

    }

    public function destroy(Catagories $catagory){

    $catagory->delete();
    return to_route('admin.catagories.index')->with('message', 'Catagory Deleted');

    }
}