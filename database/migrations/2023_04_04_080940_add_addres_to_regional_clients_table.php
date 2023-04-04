<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAddresToRegionalClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('regional_clients', function (Blueprint $table) {
            $table->string('user_id')->after('name')->nullable();
            $table->string('pin')->after('pan')->nullable();
            $table->string('city')->after('pin')->nullable();
            $table->string('address')->after('city')->nullable();
            $table->string('notification')->after('address')->default(0)->comment('0=>No 1=>Yes');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('regional_clients', function (Blueprint $table) {
            //
        });
    }
}
