<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResturantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resturants', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->string('name')->comment('Reataurant name');
            $table->string('address')->comment('Reataurant address');
            $table->string('email')->comment('Reataurant Email');
            $table->string('decription')->comment('Reataurant Blog');
            $table->string('image')->comment('Reataurant image');
            $table->string('video');
            $table->string('thumbnail');
            $table->string('Contact')->comment('Reataurant Customer care number');
            $table->enum('status', ['0', '1'])->default(1)->comment('0 =deactive, 1=active');
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
        Schema::dropIfExists('resturants');
    }
}
