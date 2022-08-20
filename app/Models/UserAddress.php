<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model
{
    use HasFactory;

    protected $fillable = [
        'address', 'description', 'is_default', 'lat', 'lng', 'user_id'
    ];

    protected $hidden = ['created_at', 'updated_at'];

    public function User()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
