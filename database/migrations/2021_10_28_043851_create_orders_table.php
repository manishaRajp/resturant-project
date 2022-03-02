<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_id');
            $table->unsignedBigInteger('rest_id')->comment('Resturant Name');
            $table->foreign('rest_id')->references('id')->on('resturants')->onDelete('cascade');
            $table->unsignedBigInteger('user_id')->comment('User name');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->enum('status', ['0', '1'])->default(1)->comment('0 =Approve, 1=pending');
            $table->string('apply_promo_code')->nullable();
            $table->string('discount')->nullable();
            $table->string('total');
            $table->timestamps();
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}

