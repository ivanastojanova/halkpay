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
        //
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
