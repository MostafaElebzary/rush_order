<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'title_ar',
        'title_en',
        'logo',
        'banner',
        'location',
        'phone1',
        'phone2',
        'email1',
        'email2',
        'activity_id',
        'owner_name',
        'owner_phone',
        'ceo_name',
        'ceo_phone',
        'commercial_file',
        'branches_count',
        'maroof_id',
        'lat',
        'lng',
        'is_active',
        'expire_date',
        'delivery_price',
    ];

    public function getLogoAttribute($image)
    {
        if (!empty($image)) {
            return asset('uploads/logos') . '/' . $image;
        }
        return "";
    }

    public function setLogoAttribute($image)
    {
        if (is_file($image)) {
            $imageFields = upload($image, 'logos');
            $this->attributes['image'] = $imageFields;
        }
        return "";
    }

    public function getBannerAttribute($image)
    {
        if (!empty($image)) {
            return asset('uploads/banners') . '/' . $image;
        }
        return "";
    }

    public function setBannerAttribute($image)
    {
        if (is_file($image)) {
            $imageFields = upload($image, 'banners');
            $this->attributes['image'] = $imageFields;
        }
        return "";
    }

    public function Activity()
    {
        return $this->belongsTo(Activity::class, 'activity_id');
    }
}
