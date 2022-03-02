<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiscountCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discount_coupons', function (Blueprint $table) {
            $table->id();
            $table->string('promo_code');
            $table->string('discount');
            $table->string('details');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('max_transaction');
            $table->string('min_transaction');
            $table->string('time_of_applicable');
            $table->enum('status', ['0', '1'])->default(1)->comment('0 =Active, 1=Deactive');
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
        Schema::dropIfExists('discount_coupons');
    }
}
