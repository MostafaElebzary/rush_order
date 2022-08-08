<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class Admin extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = ['name', 'email', 'phone', 'password', 'image', 'is_active'];

    protected $hidden = [
        'password', 'remember_token',
    ];


    public function setPasswordAttribute($password)
    {
        if (!empty($password)) {
            $this->attributes['password'] = Hash::make($password);
        }
    }

    public function getImageAttribute($image)
    {
        if (!empty($image)) {
            return asset('uploads/admins') . '/' . $image;
        }
        return "";
    }

    public function setImageAttribute($image)
    {
        if (is_file($image)) {
            $imageFields = upload($image, 'admins');
            $this->attributes['image'] = $imageFields;
        }
        return "";
    }

}
