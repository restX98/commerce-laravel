@extends('layouts.base')

@vite(['resources/js/product.js'])
@vite(['resources/css/category.css'])

@section('content')
    <div id="server-error" class="error-message server-error"></div>

    <div id="search">
        @foreach ($products as $product)
            <x-product-card :product="$product" />
        @endforeach
    </div>
    <div class="arrows">
        {{ $products->links('vendor.pagination.custom') }}
    </div>
@endsection
