<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      
        $categoria = Categoria::create([
            "nombre"=>"Asientos",
            "descripcion"=>"Asientos de cuero confortables",
        ]);
        $categoria->image()->create(["url"=>"/assets/images/product/medium-size/7-2.jpg"]);
      
        $categoria2 = Categoria::create([
            "nombre"=>"Aros",
            "descripcion"=>"Aros de acero reforzado",
        ]);
        $categoria2->image()->create(["url"=>"/assets/images/product/medium-size/1-1.jpg"]);
    }
}
