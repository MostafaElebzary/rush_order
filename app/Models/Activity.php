<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Activity extends Model
{
    use HasFactory;

    protected $fillable = [
        'title_ar', 'title_en', 'image', 'parent_id'
    ];

    protected $appends = ['title'];

    public function getImageAttribute($image)
    {
        if (!empty($image)) {
            return asset('uploads/activity') . '/' . $image;
        }
        return "";
    }

    public function setImageAttribute($image)
    {
        if (is_file($image)) {
            $imageFields = upload($image, 'activity');
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

    public function Parent()
    {
        return $this->belongsTo(Activity::class, 'parent_id');
    }

    public function Children()
    {
        return $this->hasMany(Activity::class, 'parent_id');
    }


    public function scopeRoot($query)
    {
        return $query->where('parent_id', null);
    }
}
