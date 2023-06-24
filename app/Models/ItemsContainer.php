<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemsContainer extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'address_id',
        'status'
    ];

    const STATUS_CART = 'cart';
    const STATUS_CREATED = 'created';
    const STATUS_SHIPPED = 'shipped';

    public function getTotalQuantityAttribute()
    {
        return $this->items->sum('quantity');
    }

    public function getTotalPriceAttribute()
    {
        return $this->items->sum('subTotalPrice');
    }

    public function items()
    {
        return $this->hasMany(Item::class, 'container_id');
    }

    public function address()
    {
        return $this->hasOne(Address::class, 'address_id');
    }
}
