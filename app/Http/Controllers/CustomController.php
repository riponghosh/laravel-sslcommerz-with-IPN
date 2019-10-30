<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('custom');
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
        $data= $request->all();
        $data['store_id']=env("STORE_ID");
        $data['store_passwd']=env("STORE_PASSWORD");
        $data['currency']='BDT';
        $data['tran_id']=uniqid();

        $data['success_url']=url('/') .'/custom/success';

        $data['shipping_method']='NO';

        $data['product_name']='Computer';
        $data['product_category']='Electronic';
        $data['product_profile']='physical-goods';
        // you can store your order in db as pending order
        $ch = curl_init('https://sandbox.sslcommerz.com/gwprocess/v4/api.php');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

        $response = curl_exec($ch);
        curl_close($ch);
        $response = json_decode($response, true);
        return redirect($response['GatewayPageURL']);
    }


    public function success(Request $request)
    {
        $data= $request->all();
        // return $data;

        // you can validate order
        $ch = curl_init("https://sandbox.sslcommerz.com/validator/api/validationserverAPI.php?val_id={$data['val_id']}&store_id=".env('STORE_ID')."&store_passwd=".env('STORE_PASSWORD')."&format=json");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);
        $response = json_decode($response, true);

        // return $response;

        if ($response['status']=='VALID' || $response['status']=='VALIDATED') {
            if ($response['tran_id']==$data['tran_id']) {
                // you can make your order Confirm or Complete in db
                return "Transaction is Successful";
            }
        }
        
        return "Invalid Transaction";
        

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
        //
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
        //
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
