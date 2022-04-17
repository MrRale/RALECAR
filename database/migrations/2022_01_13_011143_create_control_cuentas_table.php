<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateControlCuentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('control_cuentas', function (Blueprint $table) {
            $table->id();
            $table->decimal('cuota')->default(0); 
            $table->decimal('interes')->default(0);
            $table->integer('meses')->nullable();
            $table->datetime('fecha');
            $table->unsignedBigInteger('orden_id'); // para saber de que cuenta es el control
            $table->foreign('orden_id')->references('id')->on('ordens')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('control_cuentas');
    }
}
