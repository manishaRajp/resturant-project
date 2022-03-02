<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RestaurantAddMeal extends Model
{
    use HasFactory;
    protected $fillable=
    [
        'meal_id',
        'rest_id',
        'meal_name',
        'sub_name',
        'image',
        'price',
        'quantity',
        'category_id',
    ];
    public function meal()
    {
        return $this->hasOne(Meal::class, 'id', 'meal_id');
    }
    public function rest()
    {
        return $this->hasOne(Resturant::class, 'id', 'rest_id');
    }
    public function getFoodAttribute($value)
    {
        return $value ? asset('storage/food' . '/' . $value) : NULL;
    }
}
