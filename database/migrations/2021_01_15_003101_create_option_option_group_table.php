<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOptionOptionGroupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('option_option_group', function (Blueprint $table) {
            $table->unsignedBigInteger('option_id');
            $table->unsignedBigInteger('option_group_id');

            $table->unsignedTinyInteger('is_selected_by_default')->default(0);
            $table->unsignedInteger('price')->default(0);
            $table->unsignedSmallInteger('order');

            $table->foreign('option_id')
                ->onDelete('restrict')
                ->references('id')
                ->on('options');

            $table->foreign('option_group_id')
                ->onDelete('restrict')
                ->references('id')
                ->on('option_groups');

            $table->primary([ 'option_id', 'option_group_id' ], 'option_option_group_primary');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('option_option_group');
    }
}
