<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentSettlementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_settlements', function (Blueprint $table) {
            $table->id();
            $table->string('order_id')->nullable();
            $table->string('date_of_deposite')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('branch_location')->nullable();
            $table->string('amount_deposite')->nullable();
            $table->string('user_id')->nullable();
            $table->string('verify_date')->nullable();
            $table->string('payment_settlement')->default(0)->comment('0 =>no payment   1=>pending account 2=>settled');
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
        Schema::dropIfExists('payment_settlements');
    }
}
