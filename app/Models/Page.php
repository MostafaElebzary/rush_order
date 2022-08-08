<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Page extends Model
{
    use HasFactory;

    protected $fillable = [
        'title_ar',
        'title_en',
        'content_ar',
        'content_en',
        'meta_keywords',
        'meta_description',
    ];


    protected $appends = ['title', 'content'];


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
