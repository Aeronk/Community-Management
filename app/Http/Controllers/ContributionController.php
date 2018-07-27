<?php

namespace App\Http\Controllers;
use DB;
use App\contribution;
use App\category;

use App\Minister;
use App\ContributionType;
use App\Denomination;

use Illuminate\Http\Request;

class ContributionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $contris=Contribution::all();
        $types=ContributionType::all();
        return view('finance.viewcontributions')->with('contris',$contris)->with('types',$types);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()

    {
        $denominations=Denomination::with('category')->get();
        $ministers=Minister::all();
        $contributions=DB::table('contribution_types')->get();
        $provinces=DB::table('provinces')->get();
        $zones=DB::table('regions')->get();
        return view('finance.addcontribution')->with('denominations',$denominations)->with('contributions',$contributions)->with('ministers',$ministers)->with('provinces',$provinces)->with('zones',$zones);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
             Contribution::unguard();
          $indcontributions=Contribution::create([

            'denomination_id' =>$request->input('denomination_id'),
            'province' =>$request->input('province'),
            'zone' =>$request->input('zone'),
            'type' => $request->input('type'),
            'transaction_id' => $request->input('transaction_id'),
            'amount' =>$request->input('amount_recieved'),
            'received_from' =>$request->input('received_from'),
            'date_recieved' =>$request->input('date_recieved'),
            'status' =>$request->input('status'),
            'comment' =>$request->input('comment')
       ] );

           return redirect()->back()->with('message', 'Contribution Added successfully');
             
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\contribution  $contribution
     * @return \Illuminate\Http\Response
     */
    public function show(contribution $contribution)

    {
        return view('finance.singlecontri')->with('contribution',$contribution);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\contribution  $contribution
     * @return \Illuminate\Http\Response
     */
    public function edit(contribution $contribution)
    {
        return view('finance.editcontri')->with('contribution',$contribution);
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\contribution  $contribution
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, contribution $contribution)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\contribution  $contribution
     * @return \Illuminate\Http\Response
     */
    public function destroy(contribution $contribution)
    {
        //
    }
}
