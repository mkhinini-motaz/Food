<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientShopTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_shop', function (Blueprint $table) {
            $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('shop_id');

            $table->mediumInteger('loyalty_points_count')->default(0);

            $table->foreign('client_id')
                ->onDelete('restrict')
                ->references('id')
                ->on('clients');

            $table->foreign('shop_id')
                ->onDelete('restrict')
                ->references('id')
                ->on('shops');

            $table->primary([ 'client_id', 'shop_id' ]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('client_shop');
    }
}
