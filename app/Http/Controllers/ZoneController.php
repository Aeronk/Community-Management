<?php

namespace App\Http\Controllers;

use App\Zone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ZoneController extends Controller
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
            'zone' => 'required',
            'province_id' => 'required'
        ])->validate();

        Zone::create([
           'name' => $request->input('zone'),
            'province_id' => $request->input('province_id')
        ]);

        return redirect()->back()->with('message', 'Zone Added successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Zone  $zone
     * @return \Illuminate\Http\Response
     */
    public function show(Zone $zone)
    {
        //
    }

    /**
     * @param Zone $zone
     * @return Zone
     */
    public function edit(Zone $zone)
    {
        return $zone;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Zone  $zone
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        Validator::make($request->all(),[
            'id' => 'required',
            'zone' => 'required',
            'province_id' => 'required'
        ])->validate();

        $zone = Zone::findOrFail($request->input('id'));

        $update = $zone->update([
            'name' => $request->input('zone'),
            'province_id' => $request->input('province_id')
        ]);

        if ($update){
            return redirect()->back()->with('message', 'Zone was updated successfully', 'success');
        }else return redirect()->back()->with('message', 'Error when updating zone.', 'error');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Zone  $zone
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Zone::findOrFail($id)->delete();

        if($delete){
            return response()->json(['answer' => 'deleted']);
        }
    }
}
