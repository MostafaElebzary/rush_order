<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Branch extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id', 'lat', 'lng', 'city_id', 'title_ar', 'title_en', 'delivery_time'
    ];
    protected $appends = ['title'];

    public function getTitleAttribute()
    {
        if ($locale = App::currentLocale() == "en") {
            return $this->title_en;
        } else {
            return $this->title_ar;
        }
    }

    public function Company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function Orders()
    {
        return $this->hasMany(Order::class, 'branch_id');
    }

    public function City()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

}
