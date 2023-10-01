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
        Schema::table('shops', function (Blueprint $table) {
            $table->dropColumn('loyalty_action_rewards');
            $table->dropColumn('ga_tracking_id');
            $table->dropColumn('pricing_category');
            $table->dropColumn('signup_is_open');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('shops', function (Blueprint $table) {
            $table->text('loyalty_action_rewards')->default([]);
            $table->string('ga_tracking_id', 50)->nullable()->comment('Google Analytics tracking id');
            $table->smallInteger('pricing_category')->comment('@see App\Model\Shop::PRICING_CATEGORIES');
            $table->unsignedTinyInteger('signup_is_open')->default(0);
        });
    }
};
