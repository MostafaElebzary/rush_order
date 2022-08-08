<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyRate extends Model
{
    use HasFactory;

    protected $fillable = [
        'rate', 'comment', 'user_name', 'company_id', 'user_id'
    ];

    public function User()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function Company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }
}

