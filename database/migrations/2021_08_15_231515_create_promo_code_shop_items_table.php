<?php

use App\Models\PromoCodeShopItem;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePromoCodeShopItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promo_code_shop_items', function (Blueprint $table) {
            $table->id();

            $table->unsignedMediumInteger('points');
            $table->unsignedInteger('reduction_amount');
            $table->string('currency', 5);

            $table->unsignedInteger('created_at');
            $table->unsignedInteger('updated_at');
        });

        foreach (PromoCodeShopItem::DEFAULT_POINTS_TO_VALUE as $points => $reductionAmount) {
            $promoCodeValue = new PromoCodeShopItem();

            $promoCodeValue->points           = $points;
            $promoCodeValue->currency         = 'TND';
            $promoCodeValue->reduction_amount = $reductionAmount;

            $promoCodeValue->save();
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('promo_code_shop_items');
    }
}
