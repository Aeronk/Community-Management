<?php

namespace App\Http\Controllers;
use DB;
use App\Activity;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $activities=Activity::all();
        return view('activities.activity-view')->with('activities',$activities);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('activities.activity-add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          $this->validate($request, [
            
            'type' => 'required',
            'description' => 'required',
            
            
        ]);

            Activity::unguard();
             Activity::create([
            
            'date' => $request->input('date'),
            'type' => $request->input('type'),
            'description' => $request->input('description'),
            'organiser' => $request->input('organiser'),
            'total_members' => $request->input('total_members'),
            'men' => $request->input('men'),
            'women' => $request->input('women'),
            'hod' => $request->input('hod'),
            'pastors' => $request->input('pastors'),
            // 'comment' => $request->input('comment'),
        ]); 

             return redirect()->back()->with('message', 'Activity Added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function show(Activity $activity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function edit(Activity $activity)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Activity $activity)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function destroy(Activity $activity)
    {
        //
    }
}
