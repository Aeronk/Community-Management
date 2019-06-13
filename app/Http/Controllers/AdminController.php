<?php

namespace App\Http\Controllers;

use App\Account;
use App\ActivityType;
use App\Category;
use App\ContributionType;
use App\Country;
use App\ExpenditureType;
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
        $expenditure_types = ExpenditureType::all();
        $contribution_types = ContributionType::all();
        $activity_types = ActivityType::all();

        return view('admin.settings',[
            'titles' => $titles,
            'provinces' => $provinces,
            'zones' => $zones,
            'categories' => $categories,
            'countries' => $countries,
            'marital_statuses' => $marital_statuses,
            'accounts' => $accounts,
            'payment_method' => $payment_methods,
            'expenditure_types' => $expenditure_types,
            'contribution_types' => $contribution_types,
            'activity_types' => $activity_types,
        ]);
    }
}
