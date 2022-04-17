<?php

namespace Database\Seeders;

use App\Models\Empresa;
use Illuminate\Database\Seeder;

class EmpresaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Empresa::create([
            "iva"=>12,
"direccion"=>"Quito-Quitumbe, calle Lirañan y Ñusta",
"telefono"=>"0985685108",
"telefono2"=>"0985685108",
"correo"=>"automotriz_rale@outlook.com",
        ]);
    }
}
