@extends('layouts.checkout')

@vite(['resources/css/thankyou.css'])

@section('content')
    <div id="thankyou">
        <div class="items">
            <h1>Grazie per il tuo ordine</h1>
            <ul>
                @foreach ($order->items as $item)
                    <li class="product" data-product="{{ $item->product->cod }}" data-name="{{ $item->product->name }}"
                        data-price="{{ $item->product->price }}" data-category="{{ $item->product->category->cod }}">
                        <img class="product-image" src="{{ $item->product->image }}" alt="{{ $item->product->name }}">
                        <div class="product-details">
                            <h3>{{ $item->product->name }}</h3>
                            <p>
                                Prezzo: €
                                <span class='price'> {{ $item->product->price }} </span>
                                x
                                <span class='quantity'> {{ $item->quantity }} </span>
                            </p>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="address">
            <h2>Indirizzo</h2>
            <p>
                {{ $order->address->toString() }}
            </p>
        </div>
    </div>
@endsection
