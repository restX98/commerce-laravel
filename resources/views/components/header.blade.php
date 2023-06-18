@vite(['resources/css/header.css'])

<header>
    <div class="top-bar">
        <div class="container">
            <div class="logo">
                <a href="/">Logo</a>
            </div>
            <div class="separator">
            </div>
            <div class="user icon">
                <a href="/profile">
                    <img src="{{ asset('/icons/user.svg') }}" alt="User Icon">
                </a>
            </div>
            <div class="cart icon" data-quantity="10" >
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
    <div class="bottom-bar">
        <div class="container">
        <ul class="categories">
            <li><a href="$category->url"> category </a></li>
            <li><a href="$category->url"> category </a></li>
            <li><a href="$category->url"> category </a></li>
            <li><a href="$category->url"> category </a></li>
        </ul>
        </div>
    </div>
</header>