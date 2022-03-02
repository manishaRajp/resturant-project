<?php

namespace App\Imports;

use App\Models\RestaurantAddMeal;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportMeal implements ToModel
{
    public function model(array $row)
    {

        $meal_id = strval($row['0']);
        $rest_id = strval($row['1']);
        $stock = strval($row['6']);
        return new RestaurantAddMeal([
            'meal_id' => $meal_id,
            'rest_id' => $rest_id,
            'meal_name' => $row['2'],
            'sub_name' => $row['3'],
            'price' => $row['4'],
            'quantity' => $row['5'],
            'stock' => $stock,



        ]);
    }
}
