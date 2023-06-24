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
}
