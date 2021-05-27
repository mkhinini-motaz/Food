<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoyaltyActionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loyalty_actions', function (Blueprint $table) {
            $table->id();

            $table->unsignedTinyInteger('type');
            $table->mediumInteger('points_rewarded');

            $table->unsignedBigInteger('client_id')->comment('The client receiving the points');
            $table->text('meta')->nullable();

            $table->unsignedInteger('created_at');
            $table->unsignedInteger('updated_at');

            $table->foreign('client_id')
                ->onDelete('cascade')
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
        Schema::dropIfExists('loyalty_actions');
    }
}
