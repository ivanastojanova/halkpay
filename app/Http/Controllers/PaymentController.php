<?php

namespace App\Http\Controllers;

use App\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $amount = '1';
        $instalment = '';
        $oid = '';

        $paymentUrl = config('app.paymentUrl');
        $clientId = config('app.clientId');
        $okUrl = config('app.okUrl');
        $failUrl = config('app.failUrl');
        $currencyVal = config('app.currencyVal');
        $storekey = config('app.storekey');
        $storetype = config('app.storetype');
        $lang = config('app.lang');
        $transactionType = config('app.transactionType');

        $rnd = microtime();
        $hashstr = $clientId . $oid . $amount . $okUrl . $failUrl . $transactionType . $instalment . $rnd . $storekey;
        $hash = base64_encode(pack('H*', sha1($hashstr)));

        return view('payments.paymentform', compact('paymentUrl', 'clientId', 'amount',
            'okUrl', 'failUrl', 'currencyVal', 'storekey', 'storetype', 'lang', 'transactionType', 'instalment', 'oid',
            'rnd', 'hash'
        ));
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $requestParams = $request->all();

        $storekey = config('app.storekey');
        $mdStatus = $request->post('mdStatus');       //Result of the 3D Secure authentication. 1,2,3,4 are successful; 5,6,7,8,9,0 are unsuccessful.
        $AuthCode = $request->post('AuthCode');
        $Response = $request->post('Response');
        $HostRefNum = $request->post('HostRefNum');
        $ProcReturnCode = $request->post('ProcReturnCode');
        $TransId = $request->post('TransId');
        $ErrMsg = $request->post('ErrMsg');




        $hashparams = $request->post("HASHPARAMS");
        $hashparamsval = $request->post("HASHPARAMSVAL");
        $hashparam = $request->post("HASH");





        $paramsval="";
        $index1=0;

        while($index1 < strlen($hashparams))
        {
            $index2 = strpos($hashparams,":",$index1);
            $vl_key = substr($hashparams,$index1,$index2- $index1);

            $vl = $request->post($vl_key);

            if($vl == null)
                $vl = "";
            $paramsval = $paramsval . $vl;
            $index1 = $index2 + 1;
        }
        $hashval = $paramsval.$storekey;
        $hash = base64_encode(pack('H*',sha1($hashval)));




        $Message =  "Red: Hash values error. Please check parameters posted to 3D secure page.";

        if ($hashparams != null)
        {

            $Message =  "Red: 3D authentication unsuccesful.";

            if($mdStatus =="1" || $mdStatus == "2" || $mdStatus == "3" || $mdStatus == "4")
            {
                $Message = "Green: 3D Authentication is successful";
            }


            if($paramsval != $hashparamsval || $hashparam != $hash)
            {
                $Message = "Red: Security warning. Hash values mismatch.";
            }
        }


        //Payment Result
        $MessagePay = "Red: 3D Authentication is not successful";

        if ($mdStatus =="1" || $mdStatus == "2" || $mdStatus == "3" || $mdStatus == "4")
        {
            $MessagePay = "Red: Your payment is not approved";

            if ( $Response == "Approved")
            {
                $MessagePay =  "Green: Your payment is approved";
            }

        }






        return view('payments.results', compact('Message','MessagePay','requestParams','AuthCode',
            'Response','HostRefNum','ProcReturnCode','TransId','ErrMsg'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Payment $payment
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Payment $payment
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Payment $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Payment $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $payment)
    {
        //
    }
}
