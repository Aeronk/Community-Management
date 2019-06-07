<?php

namespace App\Http\Controllers;

use DB;
use App\Expense;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $expenses = Expense::all();
        return view('finance.view-expenses')->with('expenses', $expenses);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $extypes = DB::table('expenditure_types')->get();

        return view('finance.add-expense')->with('extypes', $extypes);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        Expense::unguard();

        $expense = Expense::create([
            'date_added' => $request->input('date_added'),
            'expenditure' => $request->input('expenditure'),
            'supplier_name' => $request->input('supplier'),
            'transaction_id' => $request->input('transaction_id'),
            'amount' => $request->input('amount'),
            'payment_method' => $request->input('payment_method'),
            'accounts' => $request->input('accounts'),
            'payment_status' => $request->input('payment_status'),


        ]);
        // return redirect()->back()->with('message', 'Expense Added successfully');
        return redirect()->route('expenses.show', [$expense->id])->with('message', 'Expense Added successfully');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Expense $expense
     * @return \Illuminate\Http\Response
     */
    public function show(Expense $expense)
    {
        return view('finance.single-expense')->with('expense', $expense);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Expense $expense
     * @return \Illuminate\Http\Response
     */
    public function edit(Expense $expense)
    {
        $extypes = DB::table('expenditure_types')->get();
        return view('finance.edit-expenses')->with('expense', $expense)->with('extypes', $extypes);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Expense $expense
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Expense $expense)
    {

        Expense::unguard();

        $expense->update([
            'date_added' => $request->input('date_added'),
            'expenditure' => $request->input('expenditure'),
            'supplier_name' => $request->input('supplier'),
            'transaction_id' => $request->input('transaction_id'),
            'amount' => $request->input('amount')


        ]);
        return redirect()->route('expenses.show', [$expense->id])->with('message', 'Expense Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Expense $expense
     * @return \Illuminate\Http\Response
     */
    public function destroy(Expense $expense)
    {
        $remove = $expense->delete();
        if ($remove) {
            return redirect()->back()->with('message', 'Expense deleted successfully');
        }
    }
}
