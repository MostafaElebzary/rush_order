<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class City extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'nameEn', 'is_active', 'state_id '];


    public function getTitleAttribute()
    {
        if ($locale = App::currentLocale() == "en") {
            return $this->nameEn;
        } else {
            return $this->title_ar;
        }
    }

    public function State()
    {
        return $this->belongsTo(state::class, 'state_id');
    }
}
