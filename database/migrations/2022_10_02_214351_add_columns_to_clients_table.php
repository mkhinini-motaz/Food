<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clients', function (Blueprint $table) {
            $table->unsignedTinyInteger('gender')
                ->nullable()
                ->after('last_name');

            $table->unsignedBigInteger('inviter_client_id')
                ->nullable()
                ->after('last_login_at');

            $table->foreign('inviter_client_id')
                ->onDelete('restrict')
                ->references('id')
                ->on('clients');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('clients', function (Blueprint $table) {
            $table->dropColumn('gender');
            $table->dropColumn('inviter_client_id');
        });
    }
}
