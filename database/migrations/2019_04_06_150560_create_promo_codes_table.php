<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePromoCodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promo_codes', function (Blueprint $table) {
            $table->id();

            $table->string('code');
            $table->integer('expires_at')->nullable(); // TODO: consider not nullable
            $table->integer('max_usage_count')->nullable();
            $table->unsignedInteger('reduction_amount');

            $table->unsignedBigInteger('creator_id')->nullable();
            $table->string('creator_type')->nullable();

            $table->unsignedInteger('created_at');
            $table->unsignedInteger('updated_at');
            $table->unsignedInteger('deleted_at')->nullable();
        });

        Schema::table('promo_codes', function (Blueprint $table) {
            DB::statement(
            'ALTER TABLE promo_codes
                ADD CONSTRAINT chk_code_has_at_least_one_way_to_expire
                CHECK (
                  CAST(expires_at <> NULL AS UNSIGNED) +
                  CAST(max_usage_count <> NULL AS UNSIGNED) > 1
                );'
            );

            DB::statement(
            'ALTER TABLE promo_codes
                ADD CONSTRAINT chk_creator_columns_integrity
                CHECK (
                  CAST(creator_id <> NULL AS UNSIGNED) =
                  CAST(creator_type <> NULL AS UNSIGNED)
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
        Schema::dropIfExists('promo_codes');
    }
}
