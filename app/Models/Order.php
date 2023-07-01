<?php

namespace App\Models;


class Order extends ItemsContainer
{
    protected $table = 'items_containers';

    public function __construct(array $attributes = [])
    {
        if (count($attributes) === 0) return;
        $basket = $attributes[0];
        $address = $attributes[1];

        $basket->status = self::STATUS_CREATED;
        $basket->address_id = $address->id;
        $basket->save();

        $this->status = self::STATUS_CREATED;
        $this->customer_id = $basket->customer->id;
        $this->address_id = $address->id;
        $this->id = $basket->id;
    }

    public static function placeOrder(Basket $basket, Address $address)
    {
        if ($basket->items->count() === 0) {
            throw new \Exception("Il numero di prodotti nel carrello deve essere maggiore di 0.");
        }

        if ($basket->totalPrice <= 0) {
            throw new \Exception("Il prezzo del carrello deve essere maggiore di 0.");
        }
        $order = new Order([$basket, $address]);

        return $order;
    }

    public function getCodAttribute()
    {
        return str_pad($this->id, 6, '0', STR_PAD_LEFT);
    }

    public function getUpperStatusAttribute()
    {
        return strtoupper($this->status);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function toString()
    {
        return "$this->cod - $this->updated_at - $this->upperStatus";
    }
}
