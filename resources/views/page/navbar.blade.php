<!-- navbar start -->
<nav class="navbar">
    <a href="#" class="navbar-logo">Cahaya<span>Musik</span>.</a>

    <div class="navbar-nav">
        <a href="{{ route('home') }}">Home</a>
        <a href="#about">Tentang Kami</a>
        <a href="#menu">Our Service</a>
        <a href="#ourgallery">Our Gallery</a>
        <a href="#contact">Kontak</a>
        <a href="{{ route('orders.my', Auth::user()?->customer?->customer_id) }}">My Orders</a>
    </div>

    <div class="navbar-extra">
        <a href="#" id="search-button"><i data-feather="search"></i></a>
        <a href="#" id="shopping-cart-button"><i data-feather="shopping-cart"></i></a>
        <a href="#" id="hamburger-menu"><i data-feather="menu"></i></a>

        @if (session()->has('user'))
            {{-- <span class="user-role">{{ session('user.name') }}</span> --}}
            <a href="{{ route('logout') }}" id="logout"><i data-feather="log-out"></i></a>
        @else
            <a href="{{ route('login') }}" id="login"><i data-feather="log-in"></i></a>
        @endif
    </div>

    <!-- Search Form STart -->
    <div class="search-form">
        <input type="search" id="search-box" placeholder="search here.." />
        <label for="search-box"><i data-feather="search"></i></label>
    </div>
    <!-- Search Form End -->

    <!-- shopping cart start -->
    <div class="shopping-cart">
        <div class="cart-item">
            <img src="img/product/product_1.jpg" alt="Product 1" />
            <div class="item-detail">
                <h3>Product 1</h3>
                <div class="item-price">IDR 30k</div>
            </div>
            <i data-feather="trash-2" class="remove-item"></i>
        </div>
        <div class="cart-item">
            <img src="img/product/product_1.jpg" alt="Product 1" />
            <div class="item-detail">
                <h3>Product 1</h3>
                <div class="item-price">IDR 30k</div>
            </div>
            <i data-feather="trash-2" class="remove-item"></i>
        </div>
        <div class="cart-item">
            <img src="img/product/product_1.jpg" alt="Product 1" />
            <div class="item-detail">
                <h3>Product 1</h3>
                <div class="item-price">IDR 30k</div>
            </div>
            <i data-feather="trash-2" class="remove-item"></i>
        </div>
    </div>
    <!-- shopping cart end -->
</nav>
<!-- navbar end -->
