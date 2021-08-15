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
            $table->id();

            $table->string('name', 3000);
            $table->string('description', 3000);
            $table->unsignedSmallInteger('type')->comment('@see Product::TYPES');
            $table->string('photo')->default('default image link'); // TODO: define default image
            $table->unsignedInteger('price');
            $table->unsignedTinyInteger('is_visible')->default(0);
            $table->unsignedSmallInteger('order');

            $table->unsignedSmallInteger('added_loyalty_points')->default(0);

            $table->unsignedMediumInteger('weight')->comment('In grams');
            $table->unsignedMediumInteger('height')->comment('In centimeters')->nullable(); // To increase delivery fee if after a certain total volume of products
            $table->unsignedMediumInteger('width')->comment('In centimeters')->nullable(); // To increase delivery fee if after a certain total volume of products
            $table->unsignedMediumInteger('length')->comment('In centimeters')->nullable(); // To increase delivery fee if after a certain total volume of products

            $table->unsignedBigInteger('category_id');

            $table->unsignedInteger('created_at');
            $table->unsignedInteger('updated_at');
            $table->unsignedInteger('deleted_at')->nullable();

            $table->foreign('category_id')
                ->onDelete('cascade')
                ->references('id')
                ->on('categories');

            $table->unique([ 'category_id', 'order' ]);
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
