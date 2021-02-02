<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // TODO: change table name to include third relation
        Schema::create('order_product', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedSmallInteger('product_count');
            $table->unsignedSmallInteger('product_item_quantity')->nullable();

            $table->unsignedInteger('order_id');
            $table->unsignedInteger('product_id');
            $table->unsignedInteger('product_item_id');

            $table->foreign('order_id')
                ->onDelete('restrict')
                ->references('id')
                ->on('orders');

            $table->foreign('product_id')
                ->onDelete('restrict')
                ->references('id')
                ->on('products');

            $table->foreign('product_item_id')
                ->onDelete('restrict')
                ->references('id')
                ->on('product_items');
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
