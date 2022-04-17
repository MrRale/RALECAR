<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacturasTable extends Migration
{
    
    public function up()
    {
        Schema::create('facturas', function (Blueprint $table) {
            $table->id();
            $table->datetime('fecha')->nullable();
            $table->integer('iva')->default(12);
            $table->decimal('costo_envio')->default(0);
            $table->decimal('total')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('facturas');
    }
}
