<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name');
            $table->string('description');
            $table->smallInteger('type')->comment('@see Product::TYPES');
            $table->string('brand')->nullable()->comment('manufacturer');
            $table->string('photo')->default('default image link'); // TODO: define default image
            $table->mediumInteger('weight')->comment('In grams');
            $table->mediumInteger('height')->comment('In centimeters')->nullable(); // To increase delivery fee if after a certain total volume of products
            $table->mediumInteger('width')->comment('In centimeters')->nullable(); // To increase delivery fee if after a certain total volume of products
            $table->mediumInteger('length')->comment('In centimeters')->nullable(); // To increase delivery fee if after a certain total volume of products
            $table->integer('price')->comment('In tunisian mellimes');

            $table->unsignedInteger('category_id');

            $table->unsignedInteger('created_at');
            $table->unsignedInteger('updated_at');
            $table->unsignedInteger('deleted_at')->nullable();

            $table->foreign('category_id')
                ->onDelete('cascade')
                ->references('id')
                ->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
