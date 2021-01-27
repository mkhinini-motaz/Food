<?php

use App\Models\Admin;

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
            $table->string('email')->unique();
            $table->string('phone', 52)->unique()->nullable();
            $table->string('password');
            $table->smallInteger('role')->default(Admin::ROLE_VISITOR_ADMIN);

            $table->unsignedInteger('created_at');
            $table->unsignedInteger('updated_at');
            $table->unsignedInteger('deleted_at')->nullable();
        });

        Admin::factory()->create([
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
