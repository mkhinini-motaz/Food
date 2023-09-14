<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('choices', function (Blueprint $table) {
            $table->id();
            $table->unsignedSmallInteger('product_count');
            $table->unsignedSmallInteger('product_price'); // TODO: why unsignedSmallInteger and not integer like product.price

            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('product_id');

            $table->unsignedInteger('created_at');
            $table->unsignedInteger('updated_at');

            $table->foreign('order_id')
                ->onDelete('restrict')
                ->references('id')
                ->on('orders');

            $table->foreign('product_id')
                ->onDelete('restrict')
                ->references('id')
                ->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_product');
    }
}
