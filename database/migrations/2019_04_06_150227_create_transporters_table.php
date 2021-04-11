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
            $table->id();

            $table->string('alias')->nullable();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('password');
            $table->string('phone', 52)->unique();
            $table->string('email')->unique()->nullable();
            $table->string('shift_start_time', 10);
            $table->string('shift_end_time', 10);
            $table->unsignedTinyInteger('is_approved')->default(0);

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
