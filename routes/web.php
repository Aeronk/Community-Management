<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/test', function () {
    Mail::queue('email.ad', function ($message) {
        $message->to('test@example.com');
    });
});

Route::group(['middleware' => ['web', 'auth']], function () {


    Route::get('/', 'DashboardController@index');

    Route::get('/category', array('as' => 'category',
        'uses' => 'IndividualContributionController@myformAjax'));

    Route::get('/balance', array('as' => 'balance',
        'uses' => 'IndividualContributionController@balanceAjax'));

    Route::get('/sms', function () {
        return view('sms');

    });

    Route::get('/finance', function () {
        return view('finance.add-individual-contrib');
    });

    Route::get('/datatables', 'DatatablesController@index');

    Route::get('/datatables/data', 'DatatablesController@anyData')->name('datatables.data');

    Route::resources([
        'denomination' => "DenominationController",
        'minister' => "MinisterController",
        'individualcontribution' => "IndividualContributionController",
        'collectivecontribution' => "IndividualContributionController",
        'expenses' => 'ExpenseController',
        'dashboard' => "DashboardController",
        'sms' => "SmsController",
        'bible' => "BibleController",
        'parachurch' => "ParaChurchController",
        'activities' => "ActivityController",
        'contribution' => "ContributionController",
        'title' => "TitleController",
        'province' => "ProvinceController",
        'zone' => "ZoneController",
        'categories' => "CategoryController",
        'country' => "CountryController",
        'marital_status' => "MaritalStatusController",
        'account' => "AccountController",
        'payment_method' => "PaymentMethodController",
        'expenditure_type' => "ExpenditureTypeController",
        'contribution_type' => "ContributionTypeController",
        'activity_type' => "ActivityTypeController"
    ]);

    Route::get('expense/delete/{expense}', 'ExpenseController@destroy')->name('expenses.delete');
    Route::get('activity/delete/{activity}', 'ActivityController@destroy')->name('delete.activity');

    //This updates the title
    Route::post('title/update', 'TitleController@update')->name('update.title');
    //This deletes the title
    Route::get('title/delete/{id}', 'TitleController@destroy')->name('delete.title');

    //Update Province
    Route::post('province/update', 'ProvinceController@update')->name('update.province');
    Route::get('province/delete/{id}', 'ProvinceController@destroy');

    //Update Zone
    Route::post('zone/update', 'ZoneController@update')->name('update.zone');
    Route::get('zone/delete/{id}', 'ZoneController@destroy');

    //Update Category
    Route::post('category/update', 'CategoryController@update')->name('update.category');
    Route::get('category/delete/{id}', 'CategoryController@destroy');

    //Update Country
    Route::post('country/update', 'CountryController@update')->name('update.country');
    Route::get('country/delete/{id}', 'CountryController@destroy');

    //Update Marital Status
    Route::post('marital_status/update', 'MaritalStatusController@update')->name('update.marital_status');
    Route::get('marital_status/delete/{id}', 'MaritalStatusController@destroy');

    //Update Account
    Route::post('account/update', 'AccountController@update')->name('update.account');
    Route::get('account/delete/{id}', 'AccountController@destroy');

    //Update Payment Method
    Route::post('payment_method/update', 'PaymentMethodController@update')->name('update.payment_method');
    Route::get('payment_method/delete/{id}', 'PaymentMethodController@destroy');

    //Update Expenditure Type
    Route::post('expenditure_type/update', 'ExpenditureTypeController@update')->name('update.expenditure_type');
    Route::get('expenditure_type/delete/{id}', 'ExpenditureTypeController@destroy');

    //Update Contribution Type
    Route::post('contribution_type/update', 'ContributionTypeController@update')->name('update.contribution_type');
    Route::get('contribution_type/delete/{id}', 'ContributionTypeController@destroy');

    //Update Activity Type
    Route::post('activity_type/update', 'ActivityTypeController@update')->name('update.activity_type');
    Route::get('activity_type/delete/{id}', 'ActivityTypeController@destroy');

    Route::get('admin/settings','AdminController@settingsView')->name('admin.settings');

});

// Auth::routes();
// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::get('allusers', 'Auth\RegisterController@allusers')->name('allusers');
Route::get('delete', 'Auth\RegisterController@destroy')->name('delete');
Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

Route::get('/home', 'HomeController@index')->name('home');

