<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOptionGroupProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('option_group_product', function (Blueprint $table) {
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('option_group_id');

            $table->unsignedTinyInteger('max_options')->default(1);
            $table->unsignedTinyInteger('min_options')->default(1);
            $table->unsignedTinyInteger('options_are_quantifiable')->default(0)
                ->comment('enable quantity select');
            $table->unsignedTinyInteger('options_are_billable')->default(0)
                ->comment('make every selected option price added to the product price');
            $table->unsignedSmallInteger('order');

            $table->foreign('product_id')
                ->onDelete('restrict')
                ->references('id')
                ->on('products');

            $table->foreign('option_group_id')
                ->onDelete('restrict')
                ->references('id')
                ->on('option_groups');

            $table->primary([ 'product_id', 'option_group_id' ], 'option_group_product_primary');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('option_group_product');
    }
}
