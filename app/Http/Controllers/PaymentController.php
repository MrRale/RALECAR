<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Resolvers\PaymentPlatformResolver;

class PaymentController extends Controller
{
//     protected $paymentPlatformResolver;
//     public function _construct(PaymentPlatformResolver $paymentPlatformResolver){
// $this->$paymentPlatformResolver = $paymentPlatformResolver;
//     }
    public function pay(Request $request){
        // dd("holapay");

        $paymentPlatform = new PaymentPlatformResolver;
        $py  = $paymentPlatform->resolveService();
        // dd("hola",$py);
        // ->resolveService($request->payment_platform);
        // session()->put('paymentPlatformId',$request->paymentPlatform);
        session()->put('paymentPlatformId','paypal');
        return $py->handlePayment($request);
    }
}

