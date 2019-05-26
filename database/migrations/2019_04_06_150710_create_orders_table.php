<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');

            $table->string('message')->nullable();
            $table->tinyInteger('status')->default(1)->comment(''); // TODO: define diffrent status
            $table->string('associated_phone');
            $table->string('delivery_address');

            $table->unsignedInteger('client_id');
            $table->unsignedInteger('transporter_id')->nullable();
            $table->unsignedInteger('promo_code_id')->nullable();
            $table->unsignedInteger('shop_id');

            $table->integer('should_be_delivered_at')->nullable();
            $table->integer('created_at');
            $table->integer('updated_at');

            $table->foreign('client_id')
                ->references('id')
                ->on('clients');

            $table->foreign('transporter_id')
                ->references('id')
                ->on('transporters');

            $table->foreign('promo_code_id')
                ->references('id')
                ->on('promo_codes');

            $table->foreign('shop_id')
                ->references('id')
                ->on('shops');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
