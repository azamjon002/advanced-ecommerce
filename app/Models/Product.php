<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Product extends Model implements HasMedia
{
    use InteractsWithMedia;
    use HasFactory;

    protected $fillable =[
        'title',
        'description',
        'price',
        'quantity',
        'discount_price',
        'category_id'
    ];


    protected $appends = [
        'image',
    ];

}
