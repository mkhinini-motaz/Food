<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Order;
use App\Models\Shop;

class UpdateTableOrdersReplaceLocationIdWithShopId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->unsignedBigInteger('shop_id')
                ->nullable()
                ->after('location_id');

            $table->foreign('shop_id')
                ->onDelete('restrict')
                ->references('id')
                ->on('shops');
        });

        $sql = '( SELECT shop_id FROM locations WHERE id = orders.location_id LIMIT 1 )';
        Order::query()->update([ 'shop_id' => \DB::raw($sql) ]);

        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeign('orders_location_id_foreign');
            $table->dropColumn('location_id');
        });

        Schema::table('shops', function (Blueprint $table) {
            $table->float('latitude', 10, 6)->after('ga_tracking_id');
            $table->float('longitude', 10, 6)->after('latitude');
        });

        $sqlLatitude  = '( SELECT latitude FROM locations WHERE shop_id = shops.id LIMIT 1 )';
        $sqlLongitude = '( SELECT longitude FROM locations WHERE shop_id = shops.id LIMIT 1 )';
        Shop::query()->update([
            'latitude' => \DB::raw($sqlLatitude),
            'longitude' => \DB::raw($sqlLongitude),
        ]);

        Schema::drop('locations');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

    }
}
