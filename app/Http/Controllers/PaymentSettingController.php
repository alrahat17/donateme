<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Payment_setting;
use App\HTTP\Requests;

class PaymentSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $payment_setting = Payment_setting::first()->get();
        
        return view('payment_settings.index')->with('payment_setting',$payment_setting);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $payment_setting = Payment_setting::find($id);

        return view('payment_settings.edit')->with('payment_setting',$payment_setting);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   
        $this->validate($request,[
        'bank_payment_info' => 'required|string',
        'paypal_id' => 'required|string',
        'paypal_site_mode' => 'required|string',
        'stripe_site_mode' => 'required|string',
        'test_pub_key' => 'required|string',
        'test_sec_key' => 'required|string',
        'com_mode' => 'required|string',
        'amount' => 'required|string',
        ]);



        $payment_setting = Payment_setting::find($id);
        //adding comma with individual payment options
        if ($request->input('payment_option')!='') {
        $payment_options= array();
        $payment_options=$request->input('payment_option');
        $pay_values = implode(",",$payment_options);
        $payment_setting->payment_option = $pay_values; 
        }
        else{
        $payment_setting->payment_option = ''; 

        }

        if ($request->input('withdraw_option')!='') {
           //adding comma with individual withdraw options
        $withdraw_options= array();
        $withdraw_options=$request->input('withdraw_option');
        $withdraw_values = implode(",",$withdraw_options); 
        $payment_setting->withdraw_option = $withdraw_values;

        }
        else{
        $payment_setting->withdraw_option = ''; 

        }
        
        
        
        
        $payment_setting->bank_payment_info = $request->input('bank_payment_info');
        $payment_setting->paypal_id = $request->input('paypal_id');
        $payment_setting->paypal_site_mode = $request->input('paypal_site_mode');       
        $payment_setting->stripe_site_mode = $request->input('stripe_site_mode');       
        $payment_setting->test_pub_key = $request->input('test_pub_key');
        $payment_setting->test_sec_key = $request->input('test_sec_key');
        $payment_setting->com_mode = $request->input('com_mode');
        $payment_setting->amount = $request->input('amount');
        $payment_setting->update();
        return redirect('/payment_settings');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
