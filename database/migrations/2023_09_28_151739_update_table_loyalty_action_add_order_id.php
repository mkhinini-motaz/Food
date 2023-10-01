<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('loyalty_actions', function (Blueprint $table) {
            $table->dropForeign('loyalty_actions_shop_id_foreign');
            $table->dropColumn('shop_id');

            $table->unsignedBigInteger('order_id')->nullable()->after('client_id');

            $table->foreign('order_id')
                ->onDelete('restrict')
                ->references('id')
                ->on('orders');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('loyalty_actions', function (Blueprint $table) {
            $table->dropForeign('loyalty_actions_order_id_foreign');
            $table->dropColumn('order_id');

            $table->unsignedBigInteger('shop_id')->nullable()->after('client_id');

            $table->foreign('shop_id')
                ->onDelete('cascade')
                ->references('id')
                ->on('shops');
        });
    }
};
