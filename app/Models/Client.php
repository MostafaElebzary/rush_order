<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class Client extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name', 'image', 'email', 'phone', 'address', 'is_active', 'company_id', 'type',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
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
            return asset('uploads/clients') . '/' . $image;
        }
        return "";
    }

    public function setImageAttribute($image)
    {
        if (is_file($image)) {
            $imageFields = upload($image, 'clients');
            $this->attributes['image'] = $imageFields;
        }
        return "";
    }

    public function Company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }


    public function getAttributesAttribute()
    {
        $res = null;
        if ($this->attributes['attributes'] != null) {

            $res = json_decode($this->attributes['attributes']);

        }

        return $res;
    }

    public function getAdditionsAttribute()
    {
        $res = null;
        if ($this->attributes['additions'] != null) {

            $res = json_decode($this->attributes['additions']);

        }

        return $res;
    }

    public function getDrinksAttribute()
    {
        $res = null;
        if ($this->attributes['drinks'] != null) {

            $res = json_decode($this->attributes['drinks']);

        }

        return $res;
    }
}
