<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;


class Basket extends ItemsContainer
{
    protected $table = 'items_containers';

    protected $attributes = [
        'status' => self::STATUS_CART,
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public static function getCurrentBasket()
    {
        $customer = Auth::user();

        if ($customer->basket) {
            return $customer->basket;
        } else {
            return Basket::create([
                'customer_id' => $customer->id
            ]);
        }
    }

    public function addProduct(Product $product)
    {
        $existingItem = $this->items()->where('product_id', $product->id)->first();

        if ($existingItem) {
            $existingItem->quantity++;
            $existingItem->save();
        } else {
            Item::create([
                'container_id' => $this->id,
                'product_id' => $product->id,
            ]);
        }
    }

    public function removeProduct(Product $product)
    {
        $item = $this->items()->where('product_id', $product->id)->firstOrFail();

        if ($item) {
            $item->delete();
        }
    }
}
