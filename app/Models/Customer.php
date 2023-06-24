<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'firstName',
        'lastName',
        'email',
        'phoneNumber',
        'password',
    ];

    public function basket()
    {
        return $this->hasOne(Basket::class, 'customer_id');
    }
}
