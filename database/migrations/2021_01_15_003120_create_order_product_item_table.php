<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderProductItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_product_item', function (Blueprint $table) {
            $table->unsignedInteger('order_id');
            $table->unsignedInteger('product_item_id');

            $table->foreign('order_id')
                ->onDelete('restrict')
                ->references('id')
                ->on('orders');

            $table->foreign('product_item_id')
                ->onDelete('restrict')
                ->references('id')
                ->on('product_items');

            $table->primary([ 'order_id', 'product_item_id' ]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_product_item');
    }
}
