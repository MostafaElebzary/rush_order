<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class CompanyCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'title_ar', 'title_en', 'image', 'company_id'
    ];

    public function Company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    protected $appends = ['title'];

    public function getImageAttribute($image)
    {
        if (!empty($image)) {
            return asset('uploads/company_category') . '/' . $image;
        }
        return "";
    }

    public function setImageAttribute($image)
    {
        if (is_file($image)) {
            $imageFields = upload($image, 'company_category');
            $this->attributes['image'] = $imageFields;
        }
        return "";
    }

    public function getTitleAttribute()
    {
        if ($locale = App::currentLocale() == "en") {
            return $this->title_en;
        } else {
            return $this->title_ar;
        }
    }
}
