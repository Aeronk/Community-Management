<?php

namespace App\Http\Controllers;
use DB;
use App\Minister;
use App\Denomination;
use App\Jobs\SendMessageJob;
use Illuminate\Http\Request;

class MinisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         // $ministers=Minister::all(); 
        $ministers= Minister::with('denomination')->get();
        

        
        return view('ministers.ministers-view')->with('ministers',$ministers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $denominations=Denomination::with('hod','contact','commission','programs')->get();
        $provinces=DB::table('provinces')->get();
        $regions=DB::table('regions')->get(); 
        $titles=DB::table('titles')->get();

        return view('ministers.ministers-add')->with('denominations',$denominations)
                                    ->with('provinces',$provinces)
                                    ->with('regions',$regions)
                                    ->with('titles',$titles);
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
            'dname' => 'required',
            'branch' => 'required',
            'position' => 'required',
            'number_members' => 'required',
            'title' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
             'number_members' => 'required',
            'email' => 'required',
            'marital_status' => 'required',
            'gender' => 'required',
            'province' => 'required',
            'region' => 'required',
            'address' => 'required'
            
        ]);


        // $minister=$request->all()->except(['_token']);
        Minister::unguard();
        $minister=Minister::create([

            'denomination_id' => $request->input('dname'),
            'branch' => $request->input('branch'),
            'position' => $request->input('position'),
            'number_members' => $request->input('number_members'),
            'title' => $request->input('title'),
            'home_tel' => $request->input('home_tel'),   
            'email' => $request->input('email'),
            'marital_status' => $request->input('marital_status'),
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'gender' => $request->input('gender'),
            'province' => $request->input('province'), 
            'region' => $request->input('region'),
            'address' => $request->input('address'),



        ]);
         return redirect()->route('minister.show', [$minister->id])->with('message', 'User Added successfully');
         
          // return redirect()->back()->with('message', 'User Added successfully');
         

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Minister  $minister
     * @return \Illuminate\Http\Response
     */
    public function show(Minister $minister)
    {
        return view('ministers.ministers-single')->with('minister', $minister);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Minister  $minister
     * @return \Illuminate\Http\Response
     */
    public function edit(Minister $minister)
    {
        $denominations=Denomination::all();
        $provinces=DB::table('provinces')->get();
        $regions=DB::table('regions')->get();
        return view('ministers.ministers-edit')->with('minister', $minister)->with('denominations',$denominations)->with('provinces',$provinces)->with('regions',$regions);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Minister  $minister
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Minister $minister)
    {
        dd($minister);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Minister  $minister
     * @return \Illuminate\Http\Response
     */
    public function destroy(Minister $minister)
    {
         if($minister->delete()) {
            return redirect()->back()->with('message', "Record deleted successfully");
        }

        return redirect()->back()->with('error', "An error occured while deleting record");
        
    }
}
