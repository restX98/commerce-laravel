<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'container_id'
    ];

    public function itemsContainer()
    {
        return $this->belongsTo(ItemsContainer::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function getSubTotalPriceAttribute()
    {
        return $this->product->price * $this->quantity;
    }
}
