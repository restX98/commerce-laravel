@vite(['resources/css/header.css'])

<header>
    <div class="top-bar">
        <div class="container">
            <div class="logo">
                <a href="/">Logo</a>
            </div>
            <div class="search-bar">
                <input type="text" placeholder="Search">
                <button type="submit">
                    <img src="{{ asset('/icons/search.svg') }}" alt="User Icon">
                </button>
            </div>
            <div class="user icon">
                <a href="/profile">
                    <img src="{{ asset('/icons/user.svg') }}" alt="User Icon">
                </a>
            </div>
            @php
                $customer = Auth::user();
                $basket = $customer->basket;
                $quantity = $basket ? $basket->totalQuantity : 0;
            @endphp
            <div class="cart icon" data-quantity="{{ $quantity }}">
                <a href="/cart">
                    <img src="{{ asset('/icons/cart.svg') }}" alt="Cart Icon">
                </a>
            </div>
            <div class="logout icon">
                <a href="/logout">
                    <img src="{{ asset('/icons/logout.svg') }}" alt="Logout Icon">
                </a>
            </div>
        </div>
    </div>
    @php
        $categories = \App\Models\Category::all();
    @endphp
    @unless (count($categories) === 0)
        <div class="bottom-bar">
            <div class="container">
                <ul class="categories">
                    @foreach ($categories as $category)
                        <li><a href="{{ $category->url }}">{{ strtoupper($category->name) }}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endunless
</header>
