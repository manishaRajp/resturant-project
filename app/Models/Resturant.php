<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resturant extends Model
{
    use HasFactory;

    protected $fillable =[
        'category_id',
        'name',
        'address',
        'email',
        'decription',
        'image',
        'video',
        'contact'
    ];
    public function category(){
        return $this->hasOne(Category::class, 'id', 'category_id');
    }
    public function getImagesAttribute($value)
    {
        return $value ? asset('storage/images' . '/' . $value) : NULL;
    }

}
