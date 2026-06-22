<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /** @use HasFactory<\Database\Factories\OrderFactory> */
    use HasFactory;

    protected $fillable = [
        'full_name',
        'phone_nb',
        'district',
        'city',
        'address',
        'address_description',
        'total_amount',
        'status',
        'promocode',

    ];

    public function orderdetails()
    {
        return $this->hasMany(OrderDetails::class);
    }
}
