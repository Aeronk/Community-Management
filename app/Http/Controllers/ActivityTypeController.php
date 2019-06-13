<?php

namespace App\Http\Controllers;

use App\ActivityType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ActivityTypeController extends Controller
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
            'activity_type' => 'required',
            'description' => 'required'
        ])->validate();

        ActivityType::create([
            'name' => $request->input('activity_type'),
            'description' => $request->input('description')
        ]);

        return redirect()->back()->with('message', 'Activity type Added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ActivityType  $activityType
     * @return \Illuminate\Http\Response
     */
    public function show(ActivityType $activityType)
    {
        //
    }

    /**
     * @param ActivityType $activityType
     * @return ActivityType
     */
    public function edit(ActivityType $activityType)
    {
        return $activityType;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ActivityType  $activityType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        Validator::make($request->all(),[
            'id' => 'required',
            'activity_type' => 'required',
            'description' => 'required'
        ])->validate();

        $activity_type = ActivityType::findOrFail($request->input('id'));

        $update = $activity_type->update([
            'name' => $request->input('activity_type'),
            'description' => $request->input('description')
        ]);

        if ($update){
            return redirect()->back()->with('message', 'Activity type was updated successfully', 'success');
        }else return redirect()->back()->with('message', 'Error when updating activity type.', 'error');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ActivityType  $activityType
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = ActivityType::findOrFail($id)->delete();

        if($delete){
            return response()->json(['answer' => 'deleted']);
        }
    }
}
