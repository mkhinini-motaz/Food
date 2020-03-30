<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransporterVehiculeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transporter_vehicule', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('transporter_id');
            $table->unsignedInteger('vehicule_id');

            $table->integer('usage_start_at');
            $table->integer('usage_end_at')->nullable();

            $table->unsignedInteger('created_at');
            $table->unsignedInteger('updated_at');
            $table->unsignedInteger('deleted_at')->nullable();

            $table->foreign('transporter_id')
                ->references('id')
                ->on('transporters');

            $table->foreign('vehicule_id')
                ->references('id')
                ->on('vehicules');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transporter_vehicule');
    }
}
