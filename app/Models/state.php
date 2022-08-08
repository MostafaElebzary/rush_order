<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class state extends Model
{
    use HasFactory;

    protected $fillable = ['title','nameEn','is_active'];


    public function getTitleAttribute()
    {
        if ($locale = App::currentLocale() == "en") {
            return $this->nameEn;
        } else {
            return $this->title_ar;
        }
    }

}
