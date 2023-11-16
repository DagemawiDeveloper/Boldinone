<?php

namespace App\Http\Controllers\Shop;

use App\Models\Catagories;
use App\Models\Slide\Slide;
use Illuminate\Http\Request;
use App\Models\Shop\OrderProduct;
use App\Http\Controllers\Controller;
use App\Models\Shop\Product;

class SlideController extends Controller
{
    public function index(){
        $count = OrderProduct::where('status', '=', 'paid')->count();
        $slidelist = Slide::all();
        $catagories = Catagories::all();
        return view('admin.slide.index', compact('slidelist', 'catagories', 'count'));
    }

    public function create()
    {
        $count = OrderProduct::where('status', '=', 'paid')->count();
        $catagories = Catagories::all();
        $product =  Product::all();
        return view('admin.slide.create', compact('catagories', 'count', 'product'));
    }

    Public function store(Request $request) {

        $validated = $request->validate([
            'list_by' => ['min:3'],
            'slide_image' => ['min:3'],
            'promote_des' => ['min:3'],
            'catagory' => ['min:3'],
            'subject' => ['min:3'],
            'title' => ['min:3'],
            'title_color' => ['min:3'],
            'subject_color' => ['min:3']
        ]);
        if($request->hasFile('slide_image')){
            //get filename with extension
            $validated['slide_image'] = $request->file('slide_image')->store('slide_image', 'public');
        }

        Slide::create($validated);
        
        return to_route('admin.slide.index')->with('message', 'New product Added');

    }

    public function edit(Slide $slide)
    {
        $count = OrderProduct::where('status', '=', 'paid')->count();
        $slidelist = Slide::all();
        $catagories = Catagories::all();
        $product = Product::all();
        return view('admin.slide.edit', compact('slide', 'slidelist', 'catagories', 'count', 'product'));
    }
    public function update(Request $request, Slide $slide) {

        $validated = $request->validate([

            'list_by' => ['min:1'],
            'slide_image' => ['min:1'],
            'promote_des' => ['min:1'],
            'catagory' => ['min:1'],
            'subject' => ['min:1'],
            'title' => ['min:1'],
            'title_color' => ['min:1'],
            'subject_color' => ['min:1']

        ]);

        if($request->hasFile('slide_image')){
            //get filename with extension
            $validated['slide_image'] = $request->file('slide_image')->store('slide_image', 'public');
        }
        $slide->update($validated);
        // dd($validated);
        return to_route('admin.slide.index')->with('message', 'New product Updated');
    }


    public function destroy(Slide $slide){

    $slide->delete();
    return to_route('admin.slide.index')->with('message', 'Product Deleted');

    }
}