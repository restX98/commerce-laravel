<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemsContainer extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
    ];

    const STATUS_CART = 'cart';
    const STATUS_CREATED = 'created';
    const STATUS_SHIPPED = 'shipped';

    public function items()
    {
        return $this->hasMany(Item::class, 'container_id');
    }
}
