<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIngredientIngredientCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingredient_ingredient_category', function (Blueprint $table) {
            $table->unsignedBigInteger('ingredient_id');
            $table->unsignedBigInteger('ingredient_category_id');

            $table->unsignedTinyInteger('is_by_default_selected')->default(0);
// TODO: quantity or doze
            $table->unsignedInteger('price')->default(0)->comment('In tunisian mellimes');
            $table->unsignedSmallInteger('order');

            $table->foreign('ingredient_id')
                ->onDelete('restrict')
                ->references('id')
                ->on('ingredients');

            $table->foreign('ingredient_category_id')
                ->onDelete('restrict')
                ->references('id')
                ->on('ingredient_categories');

            $table->primary([ 'ingredient_id', 'ingredient_category_id' ], 'ingredient_category_primary');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ingredient_ingredient_category');
    }
}
