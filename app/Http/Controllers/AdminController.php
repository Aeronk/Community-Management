<?php

namespace App\Http\Controllers;

use App\Account;
use App\Category;
use App\Country;
use App\MaritalStatus;
use App\PaymentMethod;
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
        $marital_statuses = MaritalStatus::all();
        $accounts = Account::all();
        $payment_methods = PaymentMethod::all();

        return view('admin.settings',[
            'titles' => $titles,
            'provinces' => $provinces,
            'zones' => $zones,
            'categories' => $categories,
            'countries' => $countries,
            'marital_statuses' => $marital_statuses,
            'accounts' => $accounts,
            'payment_method' => $payment_methods
        ]);
    }
}
