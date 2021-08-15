<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOptionOrderProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('option_order_product', function (Blueprint $table) {
            $table->id();
            $table->unsignedSmallInteger('quantity')->nullable();

            $table->unsignedBigInteger('order_product_id');
            $table->unsignedBigInteger('option_id');

            $table->foreign('order_product_id')
                ->onDelete('restrict')
                ->references('id')
                ->on('order_product');

            $table->foreign('option_id')
                ->onDelete('restrict')
                ->references('id')
                ->on('options');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('option_order_product');
    }
}
