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
            $table->increments('id');

            $table->string('code');
            $table->integer('expires_at')->nullable();
            $table->integer('max_usage_count')->nullable();

            $table->unsignedInteger('admin_id');

            $table->unsignedInteger('created_at');
            $table->unsignedInteger('updated_at');
            $table->unsignedInteger('deleted_at')->nullable();

            $table->foreign('admin_id')
                ->onDelete('restrict')
                ->references('id')
                ->on('admins');
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
