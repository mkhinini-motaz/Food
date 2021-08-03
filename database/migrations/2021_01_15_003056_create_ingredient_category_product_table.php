<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIngredientCategoryProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingredient_category_product', function (Blueprint $table) {
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('ingredient_category_id');

            $table->unsignedTinyInteger('max_ingredients')->default(1);
            $table->unsignedTinyInteger('min_ingredients')->default(1);
            $table->unsignedTinyInteger('ingredients_are_quantifiable')->default(0)
                ->comment('enable quantity select');
            $table->unsignedTinyInteger('ingredients_are_billable')->default(0)
                ->comment('make every selected ingredient price added to the product price');
            $table->unsignedSmallInteger('order');

            $table->foreign('product_id')
                ->onDelete('restrict')
                ->references('id')
                ->on('products');

            $table->foreign('ingredient_category_id')
                ->onDelete('restrict')
                ->references('id')
                ->on('ingredient_categories');

            $table->primary([ 'product_id', 'ingredient_category_id' ], 'ingredient_category_product_primary');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ingredient_category_product');
    }
}
