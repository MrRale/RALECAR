<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('marca')->nullable();
            $table->integer('stock')->default(0);
            $table->longText('descripcion')->nullable();
            $table->string('codigo',10);
            $table->decimal('precio')->default(0);
            $table->unsignedBigInteger('categoria_id')->nullable();
            $table->foreign('categoria_id')->references('id')->on('categorias');
            // ->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('inventario_id')->nullable();
            $table->foreign('inventario_id')->references('id')->on('inventarios');
            // ->onUpdate('cascade')->onDelete('cascade');

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
        Schema::dropIfExists('productos');
    }
}
