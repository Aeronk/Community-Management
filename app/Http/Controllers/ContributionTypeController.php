<?php

namespace App\Http\Controllers;

use App\ContributionType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContributionTypeController extends Controller
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
            'contribution_type' => 'required'
        ])->validate();

        ContributionType::create([
            'name' => $request->input('contribution_type')
        ]);

        return redirect()->back()->with('message', 'Contribution type Added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ContributionType  $contributionType
     * @return \Illuminate\Http\Response
     */
    public function show(ContributionType $contributionType)
    {
        //
    }

    /**
     * @param ContributionType $contributionType
     * @return ContributionType
     */
    public function edit(ContributionType $contributionType)
    {
        return $contributionType;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ContributionType  $contributionType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        Validator::make($request->all(),[
            'id' => 'required',
            'contribution_type' => 'required'
        ])->validate();

        $contribution_type = ContributionType::findOrFail($request->input('id'));

        $update = $contribution_type->update([
            'name' => $request->input('contribution_type')
        ]);

        if ($update){
            return redirect()->back()->with('message', 'Contribution type was updated successfully', 'success');
        }else return redirect()->back()->with('message', 'Error when updating contribution type.', 'error');
    }

    /**
     * Remove the specified resource
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $delete = ContributionType::findOrFail($id)->delete();

        if($delete){
            return response()->json(['answer' => 'deleted']);
        }
    }
}
