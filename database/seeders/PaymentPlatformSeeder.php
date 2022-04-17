<?php

namespace Database\Seeders;

use App\Models\PaymentPlatform;
use Illuminate\Database\Seeder;

class PaymentPlatformSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    PaymentPlatform::create([
        'name'=>'PayPal',
        // 'image',
        // public_id
    ]);
    }
}
