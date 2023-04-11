<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAppLoginToDriversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */ 
    public function up()
    {
        Schema::table('drivers', function (Blueprint $table) {
            $table->string('login_id')->after('fleet_id')->nullable();
            $table->string('password')->after('login_id')->nullable();
            $table->string('driver_password')->after('password')->nullable();
            $table->string('device_token')->after('driver_password')->nullable();
            $table->string('app_use')->after('device_token')->nullable();
            $table->string('branch_id')->after('app_use')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('drivers', function (Blueprint $table) {
            //
        });
    }
}
