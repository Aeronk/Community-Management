<?php

namespace App\Http\Controllers;

use App\PaymentMethod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PaymentMethodController extends Controller
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
            'payment_method' => 'required'
        ])->validate();

        PaymentMethod::create([
            'name' => $request->input('payment_method')
        ]);

        return redirect()->back()->with('message', 'Payment method Added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PaymentMethod  $paymentMethod
     * @return \Illuminate\Http\Response
     */
    public function show(PaymentMethod $paymentMethod)
    {
        //
    }

    /**
     * @param PaymentMethod $paymentMethod
     * @return PaymentMethod
     *
     */
    public function edit(PaymentMethod $paymentMethod)
    {
        return $paymentMethod;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PaymentMethod  $paymentMethod
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        Validator::make($request->all(),[
            'id' => 'required',
            'payment_method' => 'required'
        ])->validate();

        $payment_method = PaymentMethod::findOrFail($request->input('id'));

        $update = $payment_method->update([
            'name' => $request->input('payment_method')
        ]);

        if ($update){
            return redirect()->back()->with('message', 'Payment method was updated successfully', 'success');
        }else return redirect()->back()->with('message', 'Error when updating payment method.', 'error');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PaymentMethod  $paymentMethod
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = PaymentMethod::findOrFail($id)->delete();

        if($delete){
            return response()->json(['answer' => 'deleted']);
        }
    }
}
