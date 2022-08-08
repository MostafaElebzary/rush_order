<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanySubActivity extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'activity_id',
    ];
}
