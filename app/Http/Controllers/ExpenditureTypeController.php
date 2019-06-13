<?php

namespace App\Http\Controllers;

use App\ExpenditureType;
use App\PaymentMethod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ExpenditureTypeController extends Controller
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
            'expenditure_type' => 'required'
        ])->validate();

        ExpenditureType::create([
            'name' => $request->input('expenditure_type')
        ]);

        return redirect()->back()->with('message', 'Expenditure type Added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ExpenditureType  $expenditureType
     * @return \Illuminate\Http\Response
     */
    public function show(ExpenditureType $expenditureType)
    {
        //
    }

    /**
     * @param ExpenditureType $expenditureType
     * @return ExpenditureType
     */
    public function edit(ExpenditureType $expenditureType)
    {
        return $expenditureType;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ExpenditureType  $expenditureType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        Validator::make($request->all(),[
            'id' => 'required',
            'expenditure_type' => 'required'
        ])->validate();

        $expenditureType = ExpenditureType::findOrFail($request->input('id'));

        $update = $expenditureType->update([
            'name' => $request->input('expenditure_type')
        ]);

        if ($update){
            return redirect()->back()->with('message', 'Expenditure type was updated successfully', 'success');
        }else return redirect()->back()->with('message', 'Error when updating account.', 'error');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $delete = ExpenditureType::findOrFail($id)->delete();

        if($delete){
            return response()->json(['answer' => 'deleted']);
        }
    }
}
