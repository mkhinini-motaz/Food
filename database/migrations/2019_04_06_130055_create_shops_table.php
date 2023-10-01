<?php

use App\Models\Shop;

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
            $table->id();

            $table->string('name');
            $table->unsignedTinyInteger('type');
            $table->string('logo');
            $table->string('phone');
            $table->smallInteger('pricing_category')->comment('@see App\Model\Shop::PRICING_CATEGORIES');
            $table->integer('min_order_price');
            $table->string('average_ready_minutes', 10)->nullable()->comment('null means immediate');
            $table->string('menu_displayed_lang', 5)->default('fr');
            $table->unsignedTinyInteger('is_approved')->default(0);
            $table->unsignedTinyInteger('signup_is_open')->default(0);
            $table->text('service_area')->nullable()->comment('array of arrays, [ [lat, lng], ...]');
            $table->text('working_hours')->nullable()->comment('array of arrays, [ "monday" => [ "start" => "11:30", "end" => "01:30" ], ... ]');

            $table->text('loyalty_action_rewards')->default([]);
            $table->string('domain')->nullable();
            $table->string('ga_tracking_id', 50)->nullable()->comment('Google Analytics tracking id');
            $table->string('primary_color', 50)->nullable();
            $table->string('secondary_color', 50)->nullable();
            $table->string('facebook_url', 100)->nullable();
            $table->string('instagram_url', 100)->nullable();
            $table->string('twitter_url', 100)->nullable();
            $table->string('linkedin_url', 100)->nullable();

            $table->unsignedBigInteger('service_id');

            $table->unsignedInteger('created_at');
            $table->unsignedInteger('updated_at');
            $table->unsignedInteger('deleted_at')->nullable();

            $table->foreign('service_id')
                ->onDelete('cascade')
                ->references('id')
                ->on('services');
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
