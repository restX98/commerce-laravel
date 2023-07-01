<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
    protected $fillable = [
        'street',
        'houseNumber',
        'postalCode',
        'city',
        'province',
        'country',
        'customer_id'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function itemsContainer()
    {
        return $this->hasOne(ItemsContainer::class, 'address_id');
    }

    public function toString()
    {
        return "$this->street $this->houseNumber, $this->postalCode - "
            . "$this->postalCode, $this->city($this->province) - $this->country";
    }
}
