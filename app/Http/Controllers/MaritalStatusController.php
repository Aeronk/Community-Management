<?php

namespace App\Http\Controllers;

use App\MaritalStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MaritalStatusController extends Controller
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
            'marital_status' => 'required'
        ])->validate();

        MaritalStatus::create([
            'name' => $request->input('marital_status')
        ]);

        return redirect()->back()->with('message', 'Marital status Added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MaritalStatus  $maritalStatus
     * @return \Illuminate\Http\Response
     */
    public function show(MaritalStatus $maritalStatus)
    {
        //
    }

    /**
     * @param MaritalStatus $maritalStatus
     * @return MaritalStatus
     */
    public function edit(MaritalStatus $maritalStatus)
    {
        return $maritalStatus;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MaritalStatus  $maritalStatus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        Validator::make($request->all(),[
            'id' => 'required',
            'marital_status' => 'required'
        ])->validate();

        $marital_status = MaritalStatus::findOrFail($request->input('id'));

        $update = $marital_status->update([
            'name' => $request->input('marital_status')
        ]);

        if ($update){
            return redirect()->back()->with('message', 'Marital status was updated successfully', 'success');
        }else return redirect()->back()->with('message', 'Error when updating marital status.', 'error');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MaritalStatus  $maritalStatus
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = MaritalStatus::findOrFail($id)->delete();

        if($delete){
            return response()->json(['answer' => 'deleted']);
        }
    }
}
