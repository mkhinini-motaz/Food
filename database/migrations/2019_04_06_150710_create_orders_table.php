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
            $table->tinyInteger('status')->default(1)->comment(''); // TODO: define const status
            $table->string('associated_phone');
            $table->string('delivery_latitude', 50);
            $table->string('delivery_longitude', 50);

            $table->unsignedInteger('client_id');
            $table->unsignedInteger('promo_code_id')->nullable();
            $table->unsignedInteger('transporter_id')->nullable();
            $table->unsignedInteger('shop_id');

            $table->unsignedInteger('to_be_delivered_at')->nullable()->comment('null means as soon as possible');
            $table->unsignedInteger('created_at');
            $table->unsignedInteger('updated_at');
            $table->unsignedInteger('deleted_at')->nullable();

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
