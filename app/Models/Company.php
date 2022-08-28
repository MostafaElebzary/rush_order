<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

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
        'commercial_file'
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
            $this->attributes['logo'] = $imageFields;
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
            $this->attributes['banner'] = $imageFields;
        }
        return "";
    }

    public function getCommercialFileAttribute($image)
    {
        if (!empty($image)) {
            return asset('uploads/commercial_files') . '/' . $image;
        }
        return "";
    }

    public function setCommercialFileAttribute($image)
    {
        if (is_file($image)) {
            $imageFields = upload($image, 'commercial_files');
            $this->attributes['commercial_file'] = $imageFields;
        }
        return "";
    }

    protected $appends = ['title'];

    public function getTitleAttribute()
    {
        if ($locale = App::currentLocale() == "en") {
            return $this->title_en;
        } else {
            return $this->title_ar;
        }
    }


    public function Activity()
    {
        return $this->belongsTo(Activity::class, 'activity_id');
    }


    public function Branches()
    {
        return $this->hasMany(Branch::class, 'company_id');
    }

    public function CompanyCategories()
    {
        return $this->hasMany(CompanyCategory::class, 'company_id');
    }

    public function Rates()
    {
        return $this->hasMany(CompanyRate::class, 'company_id');
    }

    public function carts()
    {
        return $this->hasMany(Cart::class, 'company_id');
    }

    public function Orders()
    {
        return $this->hasMany(Order::class, 'company_id');
    }

    public function CompanyWorkTime()
    {
        return $this->hasMany(CompanyWorkTime::class, 'company_id');
    }

    public function CompanySubActivities()
    {
        return $this->belongsToMany(Activity::class, 'company_sub_activities', 'company_id', 'activity_id');
    }

    public function CompanyPivotActivity()
    {
        return $this->hasMany(CompanySubActivity::class, 'company_id');
    }
}
