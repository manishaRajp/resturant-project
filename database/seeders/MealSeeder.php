<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MealSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('meals')->insert([
            ['meal_cat_name' => 'BreakFast'],
            ['meal_cat_name' => 'Lunch'],
            ['meal_cat_name' => 'Dinner']
        ]);
    }
}
