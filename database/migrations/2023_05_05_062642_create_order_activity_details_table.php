<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderActivityDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_activity_details', function (Blueprint $table) {
            $table->id();
            $table->string('order_id')->nullable();
            $table->string('last_acerage')->nullable();
            $table->string('acerage')->nullable();
            $table->string('last_crop')->nullable();
            $table->string('crop')->nullable();
            $table->string('checmical_used')->nullable();
            $table->string('charging_point')->nullable();
            $table->string('noc_upload')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_activity_details');
    }
}
