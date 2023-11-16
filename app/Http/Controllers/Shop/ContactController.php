<?php

namespace App\Http\Controllers\Shop;

use App\Models\Settings;
use App\Models\Catagories;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    public function index(){
        $setting = Settings::first();
        $catagories = Catagories::get();
        return view('contact', compact('setting','catagories'));
    }
}