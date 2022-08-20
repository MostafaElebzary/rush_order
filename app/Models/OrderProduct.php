<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id', 'company_product_id', 'price', 'qty', 'attributes', 'additions', 'drinks'
    ];

    public function Order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }

    public function CompanyProduct()
    {
        return $this->belongsTo(CompanyProduct::class, 'company_product_id');
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
