<?php

namespace App\Http\Controllers\Shop;


use App\Models\Catagories;
use Illuminate\Http\Request;
use App\Models\Shop\OrderProduct;
use App\Http\Controllers\Controller;
use App\Models\Shop\Advertising;

class AdsController extends Controller
{
    public function index(){

        return view('admin.adevert.index', [
        'count' => OrderProduct::where('status', '=', 'paid')->count(),
        'list' => Advertising::all(),
        'catagories' => Catagories::all()
        ]);
    }

    public function create()
    {
        return view('admin.adevert.create', [
        'count' => OrderProduct::where('status', '=', 'paid')->count(),
        'catagories' => Catagories::all()  
        ]);

    }

    Public function store(Request $request) {

        $validated = $request->validate([
            'list_by' => ['min:3'],
            'ads_image' => ['min:3'],
            // 'promoted_des',
            'catagory' => ['min:3'],
            'subject' => ['min:3'],
            'title' => ['min:3'],
            'title_color' => ['min:3'],
            'subject_color' => ['min:3']
        ]);
        if($request->hasFile('ads_image')){
            //get filename with extension
            $validated['ads_image'] = $request->file('ads_image')->store('adevert', 'public');
        }
        Advertising::create($validated);
        // dd($validated);
        
        return to_route('admin.adevert.index')->with('message', 'New ads Added');

    }

    public function edit(Advertising $adevert)
    {
        $count = OrderProduct::where('status', '=', 'paid')->count();
        $catagories = Catagories::all();
        return view('admin.adevert.edit', compact('adevert', 'count', 'catagories'));
    }
    public function update(Request $request, Advertising $adevert) {

        $validated = $request->validate([

            'list_by' => ['min:3'],
            'ads_image' => ['min:3'],
            // 'promoted_des',
            'catagory' => ['min:3'],
            'subject' => ['min:3'],
            'title' => ['min:3'],
            'title_color' => ['min:3'],
            'subject_color' => ['min:3']

        ]);

        if($request->hasFile('ads_image')){
            //get filename with extension
            $validated['ads_image'] = $request->file('ads_image')->store('adevert', 'public');
        }
        
        $adevert->update($validated);
        
        return to_route('admin.adevert.index')->with('message', 'New Ads Updated');
    }

    public function destroy(Advertising $adevert){
    $adevert->delete();
    return to_route('admin.adevert.index')->with('message', 'Advertisement Deleted');

    }
}