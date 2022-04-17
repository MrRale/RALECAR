<?php

namespace App\Http\Controllers;

use App\Models\PaymentPlatform;
use App\Http\Requests\StorePaymentPlatformRequest;
use App\Http\Requests\UpdatePaymentPlatformRequest;

class PaymentPlatformController extends Controller
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
     * @param  \App\Http\Requests\StorePaymentPlatformRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePaymentPlatformRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PaymentPlatform  $paymentPlatform
     * @return \Illuminate\Http\Response
     */
    public function show(PaymentPlatform $paymentPlatform)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PaymentPlatform  $paymentPlatform
     * @return \Illuminate\Http\Response
     */
    public function edit(PaymentPlatform $paymentPlatform)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePaymentPlatformRequest  $request
     * @param  \App\Models\PaymentPlatform  $paymentPlatform
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePaymentPlatformRequest $request, PaymentPlatform $paymentPlatform)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PaymentPlatform  $paymentPlatform
     * @return \Illuminate\Http\Response
     */
    public function destroy(PaymentPlatform $paymentPlatform)
    {
        //
    }
}
