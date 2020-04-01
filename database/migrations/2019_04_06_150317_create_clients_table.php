<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('id');

            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique()->nullable(); // TODO: login with either email, phone or facebook
            $table->string('phone', 50)->unique()->nullable();
            // TODO: add Facebook id
            $table->string('password');
            $table->tinyInteger('is_phone_confirmed')->default(0);
            $table->string('latitude', 50)->nullable();
            $table->string('longitude', 50)->nullable();

            $table->unsignedInteger('last_login_at')->nullable();
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
        Schema::dropIfExists('clients');
    }
}
