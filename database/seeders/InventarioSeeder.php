<?php

namespace Database\Seeders;

use App\Models\Inventario;
use Illuminate\Database\Seeder;

class InventarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Inventario::create(["nombre"=>"Inventario1"]);
        Inventario::create(["nombre"=>"Inventario2"]);
        Inventario::create(["nombre"=>"Inventario3"]);
        Inventario::create(["nombre"=>"Inventario4"]);
        Inventario::create(["nombre"=>"Inventario5"]);
    }
}
