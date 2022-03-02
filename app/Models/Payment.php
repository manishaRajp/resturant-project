<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $fillable=[
        'order_id',
        'user_id',
        'rest_id',
        'total_amount',
    ];

    public function RestName()
    {
        return $this->hasOne(Resturant::class, 'id', 'rest_id');
    }
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

}
