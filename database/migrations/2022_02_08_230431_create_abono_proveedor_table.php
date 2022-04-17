<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbonoProveedorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abono_proveedors', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('monto')->nullable();
            $table->datetime('fecha')->nullable();
            $table->unsignedBigInteger('deuda_id');
            $table->foreign('deuda_id')->references('id')->on('deudas');
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
        Schema::dropIfExists('abono_proveedor');
    }
}
