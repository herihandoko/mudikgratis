<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    public function items()
    {
        return $this->hasMany(OrderItem::class, 'order_id', 'id');
    }
    public function address()
    {
        return $this->hasOne(OrderAddress::class, 'order_id', 'id');
    }

    public function transaction()
    {
        return $this->hasOne(Transaction::class, 'order_id', 'id');
    }

    public function customer()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
