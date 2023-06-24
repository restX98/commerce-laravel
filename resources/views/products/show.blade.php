@extends('layouts.base')

@vite(['resources/js/product.js'])
@vite(['resources/css/product.css'])

@section('content')
    <div id="server-error" class="error-message server-error"></div>

    <div id="product" data-product="{{ $product->cod }}" data-name="{{ $product->name }}" data-price="{{ $product->price }}"
        data-category="{{ $product->category->cod }}">
        <div class="image">
            <img src="{{ $product->image }}" alt="{{ $product->name }}">
        </div>
        <div class="detail">
            <h1 class="name">{{ $product->name }}</h1>
            <div class="info">
                <span class="code">{{ $product->cod }}</span> - <span
                    class="category">{{ $product->category->name }}</span>
            </div>
            <div class="price">{{ $product->price }}</div>
            <button class="add-to-cart">Aggiungi al Carrello</button>
        </div>
    </div>
@endsection
