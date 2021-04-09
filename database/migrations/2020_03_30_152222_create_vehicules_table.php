<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehiculesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicules', function (Blueprint $table) {
            $table->id();

            $table->string('name')->nullable();
            $table->string('manufacturer');
            $table->string('model');
            $table->smallInteger('cylinder');
            $table->unsignedMediumInteger('max_supported_weight')->nullable()->comment('null means doesn\'t have a limit');
            $table->unsignedMediumInteger('max_supported_volume')->nullable()->comment('null means doesn\'t have a limit');

            $table->unsignedInteger('purchased_at');
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
        Schema::dropIfExists('vehicules');
    }
}
