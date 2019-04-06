<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransportersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transporters', function (Blueprint $table) {
            $table->increments('id');

            $table->string('code_name');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('password');
            $table->string('phone');
            $table->integer('starts_working_at');
            $table->integer('ends_working_at');
            $table->unsignedInteger('max_supported_weight');
            $table->tinyInteger('is_approved')->default(0);

           $table->integer('created_at');
            $table->integer('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transporters');
    }
}
