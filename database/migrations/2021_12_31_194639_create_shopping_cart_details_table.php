<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShoppingCartDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shopping_cart_details', function (Blueprint $table) {
            $table->id();
            $table->integer('cantidad')->default(1);
            $table->decimal('precio');
            $table->unsignedBigInteger('shopping_cart_id');
            $table->foreign('shopping_cart_id')->references('id')->on('shopping_carts')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('producto_id');
            $table->foreign('producto_id')->references('id')->on('productos');
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
        Schema::dropIfExists('shopping_cart_details');
    }
}
