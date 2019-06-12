<?php

namespace App\Http\Controllers;

use App\Category;
use App\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CountryController extends Controller
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
            'country' => 'required'
        ])->validate();

        Country::create([
            'name' => $request->input('country')
        ]);

        return redirect()->back()->with('message', 'Country Added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function show(Country $country)
    {
        //
    }

    /**
     * @param Country $country
     * @return Country
     */
    public function edit(Country $country)
    {
        return $country;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        Validator::make($request->all(),[
            'id' => 'required',
            'country' => 'required'
        ])->validate();

        $country = Country::findOrFail($request->input('id'));

        $update = $country->update([
            'name' => $request->input('country')
        ]);

        if ($update){
            return redirect()->back()->with('message', 'Country was updated successfully', 'success');
        }else return redirect()->back()->with('message', 'Error when updating country.', 'error');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Country::findOrFail($id)->delete();

        if($delete){
            return response()->json(['answer' => 'deleted']);
        }
    }
}
