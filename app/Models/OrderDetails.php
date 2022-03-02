<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    use HasFactory;
    protected $fillable =  [
        'rest_id',
        'meal_id',
        'user_id',
        'price',
    ];
    public function restMeal()
    {
        return $this->hasMany(RestaurantAddMeal::class, 'id', 'meal_id');
    }
    public function user()
    {
        return $this->hasMany(User::class, 'id', 'user_id');
    }

}
