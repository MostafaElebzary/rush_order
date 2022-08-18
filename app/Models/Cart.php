<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'company_id',
        'product_id',
        'qty',
        'attributes',
        'additions',
        'drinks',
        'notes',
    ];


    public function Company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function User()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function CompanyProduct()
    {
        return $this->belongsTo(CompanyProduct::class, 'product_id');
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

    public function getPriceAttribute()
    {
        $attribute_price = 0;
        $attributes = json_decode($this->attributes['attributes']);
        if ($attributes) {
            foreach ($attributes as $att) {
                if ($att) {
                    $attribute_price += $att->attribute_price;
                }
            }
        }
        $addition_price = 0;
        if ($this->additions) {
            foreach ($this->additions as $att) {
                if ($att) {
                    $addition_price += $att->addittion_price;
                }
            }
        }
        $drink_price = 0;
        if ($this->drinks) {
            foreach ($this->drinks as $att) {
                if ($att) {
                    $drink_price += $att->drink_price;
                }
            }
        }

        return $this->CompanyProduct->price * $this->qty + $attribute_price + $addition_price + $drink_price;
    }
}
