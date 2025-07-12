<!-- navbar start -->
<nav class="navbar">
    <a href="#" class="navbar-logo">Cahaya<span>Musik</span>.</a>

    <div class="navbar-nav">
        <a href="{{ route('home') }}">Home</a>
        <a href="#about">About Us</a>
        <a href="#menu">Our Service</a>
        <a href="#gallery">Our Gallery</a>
        <a href="#contact">Contact</a>
        @if (Auth::user()?->customer?->customer_id)
            <a href="{{ route('orders.my', Auth::user()?->customer?->customer_id) }}">My Orders</a>
        @endif
    </div>
    <div class="navbar-extra">
        
        <a href="#" class="nav-icon" id="hamburger-menu"><i data-feather="menu"></i></a>

        @if (session()->has('user'))
            {{-- <span class="user-role">{{ session('user.name') }}</span> --}}
            <a href="{{ route('logout') }}" class="nav-icon" id="logout"><i data-feather="log-out"></i><span>Logout</span></a>
        @else
            <a href="{{ route('login') }}" class="nav-icon"  id="login"><i data-feather="log-in"></i><span>Login</span></a>
        @endif

    </div>


</nav>
<!-- navbar end -->


 {{-- Side bar mobile --}}
 <!-- Hamburger Menu Button (only visible on mobile) -->

<!-- Sidebar Menu (muncul saat hamburger diklik) -->
<div class="mobile-sidebar" id="mobile-sidebar">
  <a href="#" class="close-btn">&times;</a>
  <a href="{{ route('home') }}">Home</a>
  <a href="#about">About Us</a>
  <a href="#menu">Our Service</a>
  <a href="#gallery">Our Gallery</a>
  <a href="#contact">Contact</a>
  @if (Auth::user()?->customer?->customer_id)
    <a href="{{ route('orders.my', Auth::user()?->customer?->customer_id) }}">My Orders</a>
  @endif
</div>
 {{-- Side bar end --}}
