<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shops', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name');
            $table->string('logo');
            $table->string('phone');
            $table->smallInteger('pricing_category')->comment('@see App\Model\Shop::PRICING_CATEGORIES');
            $table->integer('min_order_price')->comment('In tunisian mellimes');
            $table->string('average_ready_minutes', 10)->nullable()->comment('null means immediate');
            $table->tinyInteger('is_approved')->default(0);

            $table->unsignedInteger('created_at');
            $table->unsignedInteger('updated_at');
            $table->unsignedInteger('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shops');
    }
}
