<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBookingClientToRegionalClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('regional_clients', function (Blueprint $table) {
            $table->string('booking_client')->after('upload_pan')->default(0)->comment('0 =>no  1=>yes');
            $table->string('customer_type')->after('booking_client')->nullable();
            $table->string('business_plan')->after('customer_type')->nullable();
            $table->string('verification_done_by')->after('business_plan')->nullable();
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
            
        });
    }
}
