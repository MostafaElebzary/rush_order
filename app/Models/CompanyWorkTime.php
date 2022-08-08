<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyWorkTime extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id', 'day', 'open_time', 'close_time'
    ];


    public function Company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }
}
