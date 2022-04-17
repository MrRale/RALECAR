<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbonosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abonos', function (Blueprint $table) {
            $table->id();
            $table->datetime('fecha');
            $table->decimal('valor')->default(0);
            $table->unsignedBigInteger('orden_id'); // para saber a que cuenta se hace el abono
            $table->foreign('orden_id')->references('id')->on('ordens')->onDelete('cascade')->onUpdate('cascade');
            // $table->unsignedBigInteger('cuenta_id'); // para saber a que cuenta se hace el abono
            // $table->foreign('cuenta_id')->references('id')->on('cuentas')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('abonos');
    }
}
