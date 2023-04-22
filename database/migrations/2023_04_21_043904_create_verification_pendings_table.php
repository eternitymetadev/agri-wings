<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVerificationPendingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('verification_pendings', function (Blueprint $table) {
            $table->id();
            $table->string('client_id')->nullable();
            $table->string('customer_type')->nullable();
            $table->string('business_plan')->nullable();
            $table->string('verification_done_by')->nullable();
            $table->string('payment_term')->nullable();
            $table->string('remarks')->nullable();
            $table->string('draft_mode')->default(2)->comment('1 =>save as draft  2=>verified');
            $table->tinyinteger('status')->default(0)->comment('0 =>unverified  1=>verified');
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
        Schema::dropIfExists('verification_pendings');
    }
}
