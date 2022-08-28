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
        'name', 'image', 'email', 'phone', 'address', 'is_active', 'company_id', 'type','password'
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

    public function Branch()
    {
        return $this->belongsTo(Branch::class, 'branch_id');
    }


}
