<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Slider extends Model
{
    use HasFactory;

    protected $fillable = [
        'title_ar', 'title_en', 'content_ar', 'content_en', 'image', 'sort'
    ];


    protected $appends = ['title', 'content'];

    public function getImageAttribute($image)
    {
        if (!empty($image)) {
            return asset('uploads/sliders') . '/' . $image;
        }
        return "";
    }

    public function setImageAttribute($image)
    {
        if (is_file($image)) {
            $imageFields = upload($image, 'sliders');
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

    public function getContentAttribute()
    {
        if ($locale = App::currentLocale() == "en") {
            return $this->content_en;
        } else {
            return $this->content_ar;
        }
    }
}
