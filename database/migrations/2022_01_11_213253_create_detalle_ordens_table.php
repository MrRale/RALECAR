<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleOrdensTable extends Migration
{
    public function up()
    {
        Schema::create('detalle_ordens', function (Blueprint $table) {
            $table->id();
            $table->integer('cantidad')->default(1);
            $table->decimal('precio');
            
            $table->unsignedBigInteger('producto_id');
            $table->foreign('producto_id')->references('id')->on('productos');

            $table->unsignedBigInteger('orden_id');
            $table->foreign('orden_id')->references('id')->on('ordens')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

   
    public function down()
    {
        Schema::dropIfExists('detalle_ordens');
    }
}
