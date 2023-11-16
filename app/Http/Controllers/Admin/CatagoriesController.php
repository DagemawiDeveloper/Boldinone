<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Catagories;
use Illuminate\Http\Request;

class CatagoriesController extends Controller
{
    public function index(){
        $catagories = Catagories::all();
        return view('user.catagories.index', compact('catagories'));
    }

    public function create()
    {
        $catagory = Catagories::all();
        return view('user.catagories.create', compact('catagory'));
    }

     Public function store(Request $request) {

        $validated = $request->validate([
            'catagory_name' => ['min:3'],
            'catagory_description' => ['min:3'],
            'catagory_image' => ['min:3'],
            'service_list_by' => ['min:3'],
            
        ]);
        if($request->hasFile('catagory_image')){
            //get filename with extension
            $validated['catagory_image'] = $request->file('catagory_image')->store('catagories_image', 'public');
        }
        Catagories::create($validated);
        
        return to_route('user.catagories.index')->with('message', 'New Catagorie Added');

    }

    public function edit(Catagories $catagory)
    {
        return view('user.catagories.edit', compact('catagory'));
    }
    public function update(Request $request, Catagories $catagory) {

        $validated = $request->validate([
            'catagory_name' => ['min:3'],
            'catagory_description' => ['min:3'],
            'catagory_image' => ['min:3'],
            'service_list_by' => ['min:3'],
        ]);

        $catagory->update($validated);
        
        return to_route('user.catagories.index')->with('message', 'New catagories Updated');
    }


    public function destroy(Catagories $catagory){

    $catagory->delete();
    return to_route('user.catagories.index')->with('message', 'Catagory Deleted');

    }
}