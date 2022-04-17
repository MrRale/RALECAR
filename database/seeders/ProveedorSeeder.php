<?php

namespace Database\Seeders;

use App\Models\Proveedor;
use Illuminate\Database\Seeder;

class ProveedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       Proveedor::create([
           "nombre"=>"Arturo",
           "empresa"=>"GISAP S.A",
           "telefono"=>"0988702020",
           "direccion"=>" Calle José Ortega y Gasset, 40 - loc."
       ]);
    }
}
