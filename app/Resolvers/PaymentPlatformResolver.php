<?php

namespace App\Resolvers;

use Exception;
use App\Models\PaymentPlatform;

class PaymentPlatformResolver
{
    protected $paymentPlatforms;

    // public function __construct()
    // {
    //     $this->paymentPlatforms = PaymentPlatform::all();
    //     dd($this->paymentPlatforms);
    // }

     public static function resolveService()
    {
        // return "hola";
        // dd("paymentPlatformResolve Service");
        // $name = strtolower($this->paymentPlatforms->firstWhere('id', $paymentPlatformId)->name);

        $service = config("services.paypal.class");

        if ($service) {
            
            return resolve($service);
        }

        throw new Exception('The selected payment platform is not in the configuration');
    }
}