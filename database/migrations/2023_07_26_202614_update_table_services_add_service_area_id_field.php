<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateTableServicesAddServiceAreaIdField extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('services', function (Blueprint $table) {
            $table->unsignedBigInteger('service_area_id')
                ->nullable()
                ->after('photo');

            $table->foreign('service_area_id')
                ->onDelete('restrict')
                ->references('id')
                ->on('service_areas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('services', function (Blueprint $table) {
            $table->dropForeign('services_service_area_id_foreign');
            $table->dropColumn('service_area_id');
        });
    }
}
