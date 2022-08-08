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
}
