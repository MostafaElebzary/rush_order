<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class CompanyProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'company_category_id',
        'title_ar',
        'title_en',
        'content_ar',
        'content_en',
        'price',
        'image',
        'preparation_time',
        'attributes',
        'additions',
        'drinks',
        'type',
    ];

    protected $appends = ['title'];

    public function Company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function CompanyCategory()
    {
        return $this->belongsTo(CompanyCategory::class, 'company_category_id');
    }

    public function getImageAttribute($image)
    {
        if (!empty($image)) {
            return asset('uploads/company_product') . '/' . $image;
        }
        return "";
    }

    public function setImageAttribute($image)
    {
        if (is_file($image)) {
            $imageFields = upload($image, 'company_product');
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


    public function getAttributesAttribute()
    {
        $res = null;
        if ($this->attributes['attributes'] != null) {

            $res = json_decode($this->attributes['attributes']);

        }

        return $res;
    }

    public function getAdditionsAttribute()
    {
        $res = null;
        if ($this->attributes['additions'] != null) {

            $res = json_decode($this->attributes['additions']);

        }

        return $res;
    }

    public function getDrinksAttribute()
    {
        $res = null;
        if ($this->attributes['drinks'] != null) {

            $res = json_decode($this->attributes['drinks']);

        }

        return $res;
    }
}
