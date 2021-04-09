<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIngredientOrderProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingredient_order_product', function (Blueprint $table) {
            $table->id();
            $table->unsignedSmallInteger('quantity')->nullable();

            $table->unsignedBigInteger('order_product_id');
            $table->unsignedBigInteger('ingredient_id');

            $table->foreign('order_product_id')
                ->onDelete('restrict')
                ->references('id')
                ->on('order_product');

            $table->foreign('ingredient_id')
                ->onDelete('restrict')
                ->references('id')
                ->on('ingredients');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ingredient_order_product');
    }
}
