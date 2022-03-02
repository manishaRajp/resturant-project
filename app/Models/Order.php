<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_id',
        'rest_id',
        'user_id',
        'total',
        'status',
        'discount',
    ];
    public function Rest()
    {
        return $this->hasOne(Resturant::class, 'id', 'rest_id');
    }
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

}
