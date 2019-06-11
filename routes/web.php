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
        'categories' => "CategoryController"
    ]);

    Route::get('expense/delete/{expense}', 'ExpenseController@destroy')->name('expenses.delete');

    //This updates the title
    Route::post('title/update', 'TitleController@update')->name('update.title');
    //This deletes the title
    Route::get('title/delete/{id}', 'TitleController@destroy')->name('delete.title');

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

