<?php

namespace App\Repositories;

use App\Contracts\MealContract;
use App\Models\RestaurantAddMeal;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

use Exception;

class MealRepository implements MealContract
{
    public function store($data)
    {
        $image = uploadFile($data['image'], 'Food');
        $add_meal = new RestaurantAddMeal;
        $add_meal->meal_id = $data['meal_category'];
        $add_meal->rest_id = $data['rest_name'];
        $add_meal->meal_name = $data['name'];
        $add_meal->sub_name = $data['sub_name'];
        $add_meal->price = $data['price'];
        $add_meal->quantity = $data['quantity'];
        $add_meal->image = $data['image'];
        $add_meal->image = $image;
        $add_meal->save();
        return redirect()->route('admin.meal.index');
    }
    public function update($data)
    {
        $edit_meal = RestaurantAddMeal::where('id', $data['id'])->get()->first();
        if (isset($data['image'])) {
            $image = uploadFile($data['image'], 'Food');
        } else {
            $image = $edit_meal->getRawOriginal('image');
        }
        $edit_meal->meal_id = $data['category_id'];
        $edit_meal->rest_id = $data['rest_id'];
        $edit_meal->meal_name = $data['name'];
        $edit_meal->sub_name = $data['sub_name'];
        $edit_meal->price = $data['price'];
        $edit_meal->quantity = $data['quantity'];
        $edit_meal->image = $image;
        $edit_meal->save();
        return redirect()->route('admin.meal.index');
    }
}
