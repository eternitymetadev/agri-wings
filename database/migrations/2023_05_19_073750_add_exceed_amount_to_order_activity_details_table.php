<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddExceedAmountToOrderActivityDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('order_activity_details', function (Blueprint $table) {
            $table->string('last_spray_amount')->after('crop')->nullable();
            $table->string('total_spray_amount')->after('last_spray_amount')->nullable();
            $table->string('exceed_amount')->after('total_spray_amount')->nullable();
            $table->string('mode')->after('exceed_amount')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('order_activity_details', function (Blueprint $table) {
            //
        });
    }
}