<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  
    public function run()
    {
        $this->call(CategoriaSeeder::class);
        $this->call(InventarioSeeder::class);
        $this->call(EmpresaSeeder::class);
        $this->call(PermissionTableSeeder::class);
        $this->call(ProveedorSeeder::class);
        $this->call(EmpresaSeeder::class);
        $this->call(PaymentPlatformSeeder::class);
        $this->call(CurrencySeeder::class);
    }
}
