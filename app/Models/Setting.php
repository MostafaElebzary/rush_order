<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $hidden = ['created_at', 'updated_at'];
    protected $fillable = ['key', 'value', 'file'];


    public function getFileAttribute($image)
    {
        if (!empty($image)) {
            return asset('uploads/settings') . '/' . $image;
        }
        return "";
    }

    public function setFileAttribute($image)
    {

        if (is_file($image)) {
            $imageFields = upload($image, 'settings');
            $this->attributes['file'] = $imageFields;
        }
        return "";
    }

}
