<?php

use App\Models\Order;

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
            $table->id();

            $table->unsignedTinyInteger('status')->default(Order::STATUS_NEW)->comment('@see \App\Model\Order::STATUSES');
            $table->integer('total_price');
            $table->string('associated_phone');
            $table->decimal('delivery_latitude', 10, 6);
            $table->decimal('delivery_longitude', 10, 6);
            $table->string('additional_note')->nullable();
            $table->unsignedTinyInteger('source')->comment('@see \App\Model\Order::SOURCES');
            $table->unsignedTinyInteger('payment_method')->default(Order::PAYMENT_METHOD_CASH)->comment('@see \App\Model\Order::PAYMENT_METHODS');
            $table->unsignedTinyInteger('collection_method')->comment('@see \App\Model\Order::COLLECTION_METHODS');

            $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('location_id');
            $table->unsignedBigInteger('promo_code_id')->nullable();
            $table->unsignedBigInteger('transporter_id')->nullable();
            $table->unsignedBigInteger('shop_transporter_id')->nullable();

            $table->unsignedInteger('to_be_delivered_at')->nullable()->comment('null means as soon as possible');
            $table->unsignedInteger('created_at');
            $table->unsignedInteger('updated_at');
            $table->unsignedInteger('deleted_at')->nullable();

            $table->foreign('client_id')
                ->onDelete('restrict')
                ->references('id')
                ->on('clients');

            $table->foreign('location_id')
                ->onDelete('restrict')
                ->references('id')
                ->on('locations');

            $table->foreign('promo_code_id')
                ->onDelete('restrict')
                ->references('id')
                ->on('promo_codes');

            $table->foreign('transporter_id')
                ->onDelete('restrict')
                ->references('id')
                ->on('transporters');

            $table->foreign('shop_transporter_id')
                ->onDelete('restrict')
                ->references('id')
                ->on('shop_users');

            $table->index('client_id');
            $table->index('location_id');
            $table->index('transporter_id');
            $table->index('shop_transporter_id');
        });

        Schema::table('orders', function (Blueprint $table) {
            DB::statement(
                'ALTER TABLE orders
                ADD CONSTRAINT chk_order_delivered_by_one_type_of_transporter
                CHECK (
                  CAST(transporter_id IS NULL AS UNSIGNED) +
                  CAST(shop_transporter_id IS NULL AS UNSIGNED) = 1
                );'
            );
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
