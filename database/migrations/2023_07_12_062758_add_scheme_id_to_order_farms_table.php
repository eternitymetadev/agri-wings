<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSchemeIdToOrderFarmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('order_farms', function (Blueprint $table) {
            $table->string('crop_specific_id')->after('total_price')->nullable();
            $table->string('client_specific_id')->after('crop_specific_id')->nullable();
            $table->string('subvention_id')->after('client_specific_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('order_farms', function (Blueprint $table) {
            //
        });
    }
}
