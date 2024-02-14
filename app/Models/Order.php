<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'location',
        'destination',
        'seller_name',
        'customer_name',
        'customer_notes',
        'order_status',
        'attachment',   
    ];

    public function couriers()
    {
        return $this->belongsToMany(User::class, 'courier_order')
            ->withTimestamps()
            ->withPivot('chosen')
            ->using(OrderUser::class);
    }
}
