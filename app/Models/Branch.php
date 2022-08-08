<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id', 'lat', 'lng', 'city_id', 'title_ar', 'title_en'
    ];

    public function Company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function City()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

}
