<?php

namespace App\Http\Controllers;

use App\Category;
use App\Country;
use App\Province;
use App\Title;
use App\Zone;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function settingsView(){

        $titles = Title::all();
        $provinces = Province::all();
        $zones = Zone::all();
        $categories = Category::all();
        $countries = Country::all();

        return view('admin.settings',[
            'titles' => $titles,
            'provinces' => $provinces,
            'zones' => $zones,
            'categories' => $categories,
            'countries' => $countries
        ]);
    }
}
