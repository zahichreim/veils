<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /** @use HasFactory<\Database\Factories\OrderFactory> */
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'phone_nb',
        'phone_nb2',
        'email',
        'province',
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
