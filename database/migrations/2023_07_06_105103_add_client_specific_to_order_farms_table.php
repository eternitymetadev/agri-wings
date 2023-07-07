<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddClientSpecificToOrderFarmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('order_farms', function (Blueprint $table) {
            $table->string('client_specific')->after('discount_price')->nullable();
            $table->string('subvention')->after('client_specific')->nullable();
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
