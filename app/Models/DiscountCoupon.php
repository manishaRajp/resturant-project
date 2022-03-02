<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiscountCoupon extends Model
{
    use HasFactory;
    protected $fillable=[
        'promo_code',
        'discount',
        'details',
        'start_date',
        'end_date',
        'max_transaction',
        'min_transaction',
        'time_of_applicable',
        'status',
    ];

}
