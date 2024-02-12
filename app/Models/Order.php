<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function couriers()
{
    return $this->belongsToMany(User::class, 'courier_order')
        ->withTimestamps()
        ->withPivot('chosen')
        ->using(OrderUser::class);
}


    
}
