<?php

namespace App\Exports;

use App\Models\RestaurantAddMeal;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportMeal implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // return RestaurantAddMeal::all();
        return RestaurantAddMeal::select('meal_id', 'rest_id', 'meal_name', 'sub_name', 'image', 'price')->get();
    }
}
