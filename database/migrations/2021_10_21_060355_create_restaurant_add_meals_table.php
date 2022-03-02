<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestaurantAddMealsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurant_add_meals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('meal_id');
            $table->foreign('meal_id')->references('id')->on('meals')->onDelete('cascade');
            $table->unsignedBigInteger('rest_id');
            $table->foreign('rest_id')->references('id')->on('resturants')->onDelete('cascade');
            $table->string('meal_name')->comment('name of meal');
            $table->string('sub_name')->comment('sub name of meal');
            $table->string('price')->comment('Price of meal');
            $table->string('image')->comment('image of meal');
            $table->string('quantity')->comment('in stock counting');
            $table->enum('stock', ['0', '1'])->default(1)->comment('0 =out of stock, 1=available in stock');
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
        Schema::dropIfExists('restaurant_add_meals');
    }
}
