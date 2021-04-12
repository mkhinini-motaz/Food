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
            $table->id();

            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->nullable(); // TODO: login with either email, phone or facebook
            $table->string('phone', 52)->unique()->nullable();
            // TODO: add Facebook id
            $table->string('password');
            $table->unsignedTinyInteger('is_phone_confirmed')->default(0);
            $table->string('latitude', 52)->nullable();
            $table->string('longitude', 52)->nullable();

            $table->unsignedBigInteger('shop_id')->index();

            $table->unsignedInteger('last_login_at')->nullable();
            $table->unsignedInteger('created_at');
            $table->unsignedInteger('updated_at');
            $table->unsignedInteger('deleted_at')->nullable();

            $table->foreign('shop_id')
                ->onDelete('cascade')
                ->references('id')
                ->on('shops');

            $table->unique([ 'shop_id', 'phone' ]);
            $table->unique([ 'shop_id', 'email' ]);
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
