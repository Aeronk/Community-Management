<?php

namespace App\Http\Controllers;

use DB;
// use Input;
use App\IndividualContribution;
use App\category;
use App\Contact;
use App\ContributionType;
use App\Denomination;
use Illuminate\Http\Request;
use App\Jobs\SendMessageJob;
use Illuminate\Support\Facades\Input;

class IndividualContributionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $indcontributions = IndividualContribution::all();
//         dd($indcontributions);
        return view('finance.view-contrib')->with('indcontributions', $indcontributions);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $denominations = Denomination::with('category')->get();
        $contributions = DB::table('contribution_types')->get();
        $extypes = DB::table('expenditure_types')->get();
        // dd($denomination);
        return view('finance.add-individual-contrib')
            ->with('denominations', $denominations)
            ->with('contributions', $contributions)
            ->with('extypes', $extypes);
    }


    public function myformAjax()
    {

        $category = Input::get('denomination');
        $amount = DB::table("denominations")
            ->join('categories', 'denominations.category', '=', 'categories.name')
            ->where("denominations.id", $category)
            ->get();
        return json_encode($amount);
    }


    public function balanceAjax()
    {

        $denomination_id = Input::get('denomination_id');
        $balance = DB::table("denominations")
            ->where("id", $denomination_id)
            ->get('sub_balance');
        return json_encode($balance);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $i=IndividualContribution::where('transaction_id', '=', $request->input('transaction_id'))->first();
        //  if(!$i==null)
        //  {
        //  return redirect()->back()->with('error', 'Record already exists');

        //  }else {


        //   $this->validate($request, [
        //     'denomination_id' => 'required',
        //     'transaction_id' => 'required',
        //     'amount' => 'required',
        //     'received_from' => 'required',
        //     'date' => 'required',

        // ]);

        $total = $request->input('total');
        $amount = $request->input('amount_recieved');

        $newbalance = $total - $amount;

        Denomination::unguard();
        Denomination::find($request->input('denomination_id'))->update([
            "sub_balance" => $newbalance,
        ]);

//        return $request->all();


        IndividualContribution::unguard();
        $indcontributions = IndividualContribution::create([

            'denomination_id' => $request->input('denomination_id'),
            'type' => $request->input('type'),
            'transaction_id' => $request->input('transaction_id'),
            'amount' => $request->input('amount_recieved'),
            'received_from' => $request->input('received_from'),
            'payment_method' => $request->input('payment_method'),
            'account' => $request->input('accounts'),
            'date_recieved' => $request->input('date_recieved'),
            'captured_by' => $request->input('captured_by'),
            // 'comment' =>$request->input('comment')
        ]);

        $contact = Contact::where('denomination_id', $request->input('denomination_id'))->first();

        $message = "Subscription of $ " . $request->input('amount_recieved') . "has been recieved your balance is" . $newbalance . "EFZ";

        $this->dispatch(new SendMessageJob($message, $contact->facontact_number, "EFZ"));


        // return redirect()->back()->with('message', 'Contribution Added successfully');
        return redirect()->route('individualcontribution.show', [$indcontributions->id])->with('message', 'Subscription Added successfully');
        // }

    }

    /**
     *
     * Display the specified resource.
     *
     * @param  \App\IndividualContribution $individualContribution
     * @return \Illuminate\Http\Response
     */
    public function show(IndividualContribution $individualcontribution)
    {

//         dd($individualcontribution);
        return view('finance.single-contri')->with('individualcontribution', $individualcontribution);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\IndividualContribution $individualContribution
     * @return \Illuminate\Http\Response
     */
    public function edit(IndividualContribution $individualcontribution)
    {
        $denominations = Denomination::with('category')->get();
        $contributions = DB::table('contribution_types')->get();
        $extypes = DB::table('expenditure_types')->get();
        // dd($denomination);
        return view('finance.edit-contrib')
            ->with('individualcontribution', $individualcontribution)
            ->with('denominations', $denominations)
            ->with('contributions', $contributions)
            ->with('extypes', $extypes);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\IndividualContribution $individualContribution
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Individualcontribution $individualcontribution)
    {
        $data = request()->except(['_token', '_method']);

        IndividualContribution::unguard();
        if ($individualcontribution->update($data)) {
            return redirect()
                ->route('individualcontribution.index')
                ->with('message', 'Subscription was updated successfully');
        }

        return redirect()
            ->route('individualcontribution.index')
            ->with([
                'error' => 'An error occurred while trying to update Subscription information'
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\IndividualContribution $individualContribution
     * @return \Illuminate\Http\Response
     */
    public function destroy(IndividualContribution $individualContribution)
    {
        //
    }
}
