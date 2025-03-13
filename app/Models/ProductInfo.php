<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductInfo extends Model
{
    /** @use HasFactory<\Database\Factories\ProductInfoFactory> */
    use HasFactory;

    protected $fillable = [

        'quantity',
        'size_id',

    ];


    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function size()
    {
        return $this->belongsTo(Size::class);
    }
}
