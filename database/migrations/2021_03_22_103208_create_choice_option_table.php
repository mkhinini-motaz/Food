<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChoiceOptionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('choice_option', function (Blueprint $table) {
            $table->id();
            $table->unsignedSmallInteger('quantity')->nullable();
            $table->unsignedSmallInteger('price')->nullable();

            $table->unsignedBigInteger('choice_id');
            $table->unsignedBigInteger('option_id');

            $table->foreign('choice_id')
                ->onDelete('restrict')
                ->references('id')
                ->on('choices');

            $table->foreign('option_id')
                ->onDelete('restrict')
                ->references('id')
                ->on('options');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('choice_option');
    }
}
