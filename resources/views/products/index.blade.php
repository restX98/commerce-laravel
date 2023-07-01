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

    {{ $products->withQueryString()->links('vendor.pagination.custom') }}
@endsection
