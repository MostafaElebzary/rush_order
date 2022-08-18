<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'company_id', 'user_name', 'user_state', 'user_city', 'user_address', 'payment_type'
        , 'total_price', 'status', 'user_address_id', 'delivery_price', 'order_price',];

    public function User()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function Company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function OrderProducts()
    {
        return $this->hasMany(OrderProduct::class, 'order_id');
    }
}
