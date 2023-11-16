<?php

namespace App\Http\Controllers\Shop;

use App\Models\Catagories;
use App\Models\Settings;
use App\Models\Shop\Whishlist;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller; 

class AboutController extends Controller
{
    public function index(){ return view('about',[
        'setting' => Settings::first(),
        'catagories' => Catagories::get(),
        'selected_menu' => Catagories::where('is_menu','=','1')->get(),
         ]);
    }
}