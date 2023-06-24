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

    public function addAddress(array $formFields)
    {
        $formFields['customer_id'] = $this->id;
        return Address::create($formFields);
    }

    public function basket()
    {
        return $this->hasOne(Basket::class, 'customer_id')->where('status', Basket::STATUS_CART);
    }

    public function order()
    {
        return $this->hasMany(Order::class, 'customer_id');
    }

    public function address()
    {
        return $this->hasMany(Address::class, 'customer_id');
    }
}
