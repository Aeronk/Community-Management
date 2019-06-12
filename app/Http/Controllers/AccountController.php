<?php

namespace App\Http\Controllers;

use App\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Validator::make($request->all(),[
            'account' => 'required'
        ])->validate();

        Account::create([
            'name' => $request->input('account')
        ]);

        return redirect()->back()->with('message', 'Account Added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function show(Account $account)
    {
        //
    }

    /**
     * @param Account $account
     * @return Account
     */
    public function edit(Account $account)
    {
        return $account;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        Validator::make($request->all(),[
            'id' => 'required',
            'account' => 'required'
        ])->validate();

        $account = Account::findOrFail($request->input('id'));

        $update = $account->update([
            'name' => $request->input('account')
        ]);

        if ($update){
            return redirect()->back()->with('message', 'Account was updated successfully', 'success');
        }else return redirect()->back()->with('message', 'Error when updating account.', 'error');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Account::findOrFail($id)->delete();

        if($delete){
            return response()->json(['answer' => 'deleted']);
        }
    }
}
