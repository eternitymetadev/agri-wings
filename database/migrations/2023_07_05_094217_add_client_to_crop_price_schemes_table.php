<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddClientToCropPriceSchemesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('crop_price_schemes', function (Blueprint $table) {
            $table->string('type')->after('scheme_no')->nullable();
            $table->string('name')->after('type')->nullable();
            $table->string('client')->after('name')->nullable();
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
