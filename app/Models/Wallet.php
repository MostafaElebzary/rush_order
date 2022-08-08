<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    use HasFactory;

    protected $fillable = [
        'from_id',
        'from_type',
        'to_id',
        'to_type',
        'price',
        'description',
    ];
}
