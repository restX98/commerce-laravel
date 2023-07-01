@extends('layouts.checkout')

@vite(['resources/js/checkout.js'])
@vite(['resources/css/checkout.css'])

@section('content')
    <div id="server-error" class="error-message server-error"></div>

    <div id="checkout">
        <form class="address-form" method="POST">
            <div class="address">
                <h1>Checkout</h1>

                @include('partials._shipping-fields')
            </div>
            <div class="summary">
                <h2>Riepilogo</h2>
                <p>
                    Totale (<span class="total-quantity">{{ $basket->totalQuantity }}</span>
                    articoli): <span class="total-price">€ {{ $basket->totalPrice }}</span>
                </p>
                <button type="submit" class="continue-button">
                    Concludi l'ordine
                </button>
            </div>
        </form>
    </div>
@endsection
