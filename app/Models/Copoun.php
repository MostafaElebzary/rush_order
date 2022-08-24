<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Copoun extends Model
{
    use HasFactory;

    protected $fillable = [
        'code', 'from_date', 'to_date', 'amount', 'discount_type', 'active', 'usage_count'
    ];
}
