<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidosTable extends Migration
{
   
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->datetime('fecha');
            $table->longText('descripcion')->nullable();
            $table->integer('cantidad')->default(0);
            $table->decimal('total')->default(0);
            $table->string('estado_pedido')->default('pendiente');
            $table->string('empresa')->nullable();
            $table->string('ciudad');
            $table->text('direccion');
            $table->decimal('costo_envio')->default(0);
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('factura_id')->nullable();
            $table->foreign('factura_id')->references('id')->on('facturas')
            ->onUpdate('cascade')->onDelete('cascade');
            $table->softDeletes();
            $table->timestamps();
        });
    }

  
    public function down()
    {
        Schema::dropIfExists('pedidos');
    }
}
