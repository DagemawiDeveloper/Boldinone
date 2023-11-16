<?php

namespace App\Http\Controllers\user;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Catagories;

class ServiceController extends Controller
{
    public function index()
    {   
        $list_service = Service::all();
        return view('user.service.index', compact('list_service'));
    }

    public function create()
    {
        $catagories = Catagories::all();
        return view('user.service.create', compact('catagories'));
    }

    Public function store(Request $request) {

        $validated = $request->validate([
            'service_name' => ['min:3'],
            'service_catagories' => ['min:3'],
            'service_description' => ['min:3'],
            'service_list_by' => ['min:3'], 
            'main_image' => ['min:3'],
            'banner_image' => ['min:3']
        ]);
        if($request->hasFile('main_image')){
            //get filename with extension
            $validated['main_image'] = $request->file('main_image')->store('service_image', 'public');
        }
        if($request->hasFile('banner_image')){
            //get filename with extension
            $validated['banner_image'] = $request->file('banner_image')->store('service_image', 'public');
        }
        Service::create($validated);
        
        return to_route('user.service.index')->with('message', 'New Service Added');

    }

    public function edit(Service $service)
    {
        $catagories = Catagories::all();
        return view('user.service.edit', compact('service', 'catagories'));
    }
    public function update(Request $request, Service $service) {

        $validated = $request->validate([
            'service_name' => ['min:3'],
            'service_catagories' => ['min:3'],
            'service_description' => ['min:3'],
            'service_list_by' => ['min:3'],
            'main_image' => ['min:3'],
            'banner_image' => ['min:3']
        ]);

        $service->update($validated);
        
        return to_route('user.service.index')->with('message', 'New service Updated');
    }


    public function destroy(Service $service){

    $service->delete();
    return to_route('user.service.index')->with('message', 'Service Deleted');

    }

}