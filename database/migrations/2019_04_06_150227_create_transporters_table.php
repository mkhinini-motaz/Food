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

            $table->string('code_name')->nullable();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('password');
            $table->string('phone');
            $table->integer('starts_working_at');
            $table->integer('ends_working_at');
            $table->unsignedMediumInteger('max_supported_weight')->nullable()
                ->comment('null means doesn\'t have a limit');
            $table->unsignedMediumInteger('max_supported_volume')->nullable()
                ->comment('null means doesn\'t have a limit');
            $table->tinyInteger('is_approved')->default(0);

            $table->unsignedInteger('created_at');
            $table->unsignedInteger('updated_at');
            $table->unsignedInteger('deleted_at')->nullable();
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
