<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Order;
use App\Models\Product;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->string('foreign_id')->nullable()->after('category_id');
            $table->unsignedInteger('foreign_buy_price')->after('foreign_id')->nullable();
            $table->unsignedInteger('foreign_quantity_in_stock')->nullable()->after('foreign_buy_price');

            $table->unsignedInteger('profit')->after('price');
        });

        Schema::table('orders', function (Blueprint $table) {
            $table->unsignedInteger('profit')->after('total_price');
        });
        Order::query()->update([ 'profit' => 0 ]);

        Schema::table('choices', function (Blueprint $table) {
            $table->unsignedInteger('product_profit')->after('product_price');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('foreign_id');
            $table->dropColumn('foreign_quantity_in_stock');
            $table->dropColumn('foreign_buy_price');
            $table->dropColumn('profit');
        });

        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn('profit');
        });

        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn('product_profit');
        });
    }
};
