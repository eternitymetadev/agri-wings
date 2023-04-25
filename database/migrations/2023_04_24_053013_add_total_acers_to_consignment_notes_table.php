<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTotalAcersToConsignmentNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('consignment_notes', function (Blueprint $table) {
            $table->string('total_acerage')->after('id')->nullable();
            $table->string('total_amount')->after('total_acerage')->nullable();
            $table->string('bill_to')->after('total_amount')->nullable();
            $table->string('billing_client')->after('bill_to')->nullable();
            $table->dropColumn('crop');
            $table->dropColumn('acreage');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('consignment_notes', function (Blueprint $table) {
            //
        });
    }
}
