<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdensTable extends Migration
{

    public function up()
    {//para saber a quien se va a facturar la venta
        Schema::create('ordens', function (Blueprint $table) {
            $table->id();
            $table->string('cedula',10);
            $table->string('ruc',13)->nullable();
            $table->string('telefono');
            $table->string('nombres');
            $table->string('apellidos');
            $table->string('email');
            $table->datetime('fecha');
            $table->longText('descripcion')->nullable();
            $table->integer('cantidad')->default(0);
            $table->decimal('total_pagar')->default(0);
            $table->string('estado_pedido')->default('pendiente');
            $table->string('empresa')->nullable();
            $table->string('ciudad');
            $table->string('meses')->nullable();
            // $table->decimal('subtotal_iva')->default(0); calculable
            $table->decimal('subtotal')->default(0);
            $table->decimal('saldo')->default(0);
            $table->text('direccion');
            $table->decimal('costo_envio')->default(0);
            $table->unsignedBigInteger('user_id')->nullable();//para saber a quien se le vendio
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('vendedor_id')->nullable();//para saber quien hizo la venta
            $table->unsignedBigInteger('factura_id')->nullable();
            $table->foreign('factura_id')->references('id')->on('facturas')
            ->onUpdate('cascade')->onDelete('cascade');
            $table->softDeletes();
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
        Schema::dropIfExists('ordens');
    }
}
