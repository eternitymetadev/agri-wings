<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderFarmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_farms', function (Blueprint $table) {
            $table->id();
            $table->string('order_id')->nullable();
            $table->string('farm_location')->nullable();
            $table->string('crop')->nullable();
            $table->string('acreage')->nullable();
            $table->string('crop_price')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('order_farms');
    }
}
