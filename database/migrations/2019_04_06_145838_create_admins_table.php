<?php

use App\Admin;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('password');
            $table->smallInteger('role')->default(Admin::ROLE_DISPATCHER_ADMIN);
            $table->string('phone')->nullable();

            $table->integer('created_at');
            $table->integer('updated_at');
        });

        factory(Admin::class)->create([
            'first_name' => 'Moatez',
            'last_name' => 'Mkhinini',
            'email' => 'mkhinini.motaz@gmail.com',
            'password' => bcrypt('azerty'),
            'role' => Admin::ROLE_SUPER_ADMIN
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admins');
    }
}
