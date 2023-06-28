<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMaxMinToCropPriceSchemesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('crop_price_schemes', function (Blueprint $table) {
            $table->string('scheme_no')->after('id')->nullable();
            $table->string('min_acerage')->after('discount_price')->nullable();
            $table->string('max_acerage')->after('min_acerage')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('crop_price_schemes', function (Blueprint $table) {
            //
        });
    }
}
