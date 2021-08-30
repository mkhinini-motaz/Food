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
            $table->unsignedInteger('expires_at');
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
                ADD CONSTRAINT chk_creator_columns_integrity
                CHECK (
                  CAST(creator_id IS NULL AS UNSIGNED) =
                  CAST(creator_type IS NULL AS UNSIGNED)
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
