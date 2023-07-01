@props(['product'])

<div class="product" data-product="{{ $product->cod }}" data-name="{{ $product->name }}" data-price="{{ $product->price }}"
    data-category="{{ $product->category->cod }}">
    <a href={{ $product->url }}>
        <img src="{{ $product->image }}" alt="{{ $product->name }}">
    </a>
    <div class="info">
        <a href={{ $product->url }}>
            <span class="title">
                {{ $product->name }}
            </span>
        </a>
        <div class="details-container">
            <span class="price">{{ $product->price }}</span>
            <div class="details">
                <span class="code">{{ $product->cod }}</span>
                &#8226;
                <span class="category">{{ $product->category->name }}</span>
            </div>
        </div>
        <button class="add-to-cart">
            <img src="{{ asset('/icons/add.svg') }}" alt="Logout Icon">
        </button>
    </div>
</div>
