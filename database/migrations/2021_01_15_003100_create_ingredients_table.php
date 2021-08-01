<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIngredientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingredients', function (Blueprint $table) {
            $table->id();

            $table->string('name', 3000);
            $table->string('description', 3000);
            $table->string('photo')->default('default image link'); // TODO: define default image
            $table->unsignedInteger('price')->default(0)->comment('In tunisian mellimes');
            $table->unsignedTinyInteger('is_visible')->default(0);

            $table->unsignedBigInteger('ingredient_category_id');

            $table->unsignedInteger('created_at');
            $table->unsignedInteger('updated_at');
            $table->unsignedInteger('deleted_at')->nullable();

            $table->foreign('ingredient_category_id')
                ->onDelete('cascade')
                ->references('id')
                ->on('ingredient_categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ingredients');
    }
}
