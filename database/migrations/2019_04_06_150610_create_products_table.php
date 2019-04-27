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
            $table->string('photo')->default('default image link'); // TODO: define default image
            $table->integer('weight')->comment('In grams');
            $table->integer('height')->comment('In centimeters')->nullable(); // To increase delivery fee if after a certain total volume of products
            $table->integer('width')->comment('In centimeters')->nullable(); // To increase delivery fee if after a certain total volume of products
            $table->integer('length')->comment('In centimeters')->nullable(); // To increase delivery fee if after a certain total volume of products
            $table->integer('price')->comment('In tunisian mellimes');

            $table->unsignedInteger('shop_id');

            $table->integer('created_at');
            $table->integer('updated_at');

            $table->foreign('shop_id')
                ->references('id')
                ->on('shops');
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
