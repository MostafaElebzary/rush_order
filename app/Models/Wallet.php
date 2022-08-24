<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    use HasFactory;

    protected $fillable = [
        'price',
        'type',
        'company_id',
        'order_id',
        'description',
    ];

    public function Company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function Order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }
}
