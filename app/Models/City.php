<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class City extends Model
{
    use HasFactory;

    protected $table = 'city';
    protected $fillable = ['title', 'nameEn', 'is_active', 'state_id '];

    protected $appends = ['name'];

    public function getNameAttribute()
    {
        if ($locale = App::currentLocale() == "en") {
            return $this->nameEn;
        } else {
            return $this->title;
        }
    }

    public function State()
    {
        return $this->belongsTo(state::class, 'state_id');
    }
}
