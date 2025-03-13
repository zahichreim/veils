<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'color',
        'price',
        'discount',
        'sub_category_id',
        'is_featured',
        'main_image',
        'additional_information'


    ];

    public function productinfo()
    {
        return $this->hasMany(ProductInfo::class);
    }

    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }
}
