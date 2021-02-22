<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductProductItemCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_product_item_category', function (Blueprint $table) {
            $table->unsignedInteger('product_id');
            $table->unsignedInteger('product_item_category_id');
            $table->unsignedTinyInteger('max_items')->default(1);
            $table->unsignedTinyInteger('min_items')->default(1);
            $table->unsignedTinyInteger('items_are_quantifiable')->default(0)->comment('enable quantity select');
            $table->unsignedTinyInteger('items_are_billable')->default(0)->comment('make every selected productItem price added to the product price');
            $table->unsignedSmallInteger('order');

            $table->foreign('product_id')
                ->onDelete('restrict')
                ->references('id')
                ->on('products');

            $table->foreign('product_item_category_id')
                ->onDelete('restrict')
                ->references('id')
                ->on('product_item_categories');

            $table->primary([ 'product_id', 'product_item_category_id' ], 'product_product_item_category_primary');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_product_item_category');
    }
}
