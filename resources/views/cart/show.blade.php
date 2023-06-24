@extends('layouts.checkout')

@vite(['resources/js/cart.js'])
@vite(['resources/js/product.js'])
@vite(['resources/css/cart.css'])

@section('content')
    <div id="server-error" class="error-message server-error"></div>

    <div id="cart">
        <div class="items">
            <h1>Carrello</h1>
            <ul>
                @foreach ($basket->items as $item)
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
                        <button class="remove-from-cart">
                            <img src={{ asset('/icons/remove.svg') }} alt="Logout Icon">
                        </button>
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="summary">
            <h2>Riepilogo</h2>
            <p>
                Totale (<span class="total-quantity">{{ $basket->totalQuantity }}</span>
                articoli): <span class="total-price">{{ "€ $basket->totalPrice" }}</span>
            </p>
            <a href="/checkout" class="continue-button {{ $basket->totalPrice > 0 ? '' : 'disabled' }}">
                Procedi al checkout
            </a>
        </div>
    </div>
@endsection
