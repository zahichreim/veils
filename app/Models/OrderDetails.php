<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    /** @use HasFactory<\Database\Factories\OrderDetailsFactory> */
    use HasFactory;

    protected $fillable = [
        'order_id',
        'product_id',
        'size_id',
        'quantity',
        'total_amount',
    ];
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
    public function products()
    {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }
    public function sizes()
    {
        return $this->hasOne(Size::class, 'id', 'size_id');
    }
}
