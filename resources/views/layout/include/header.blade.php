<div class="navbar">
<nav class="navbar navbar-expand-lg my-navbar shadow-sm">

    <div class="container-fluid">
        <!-- <a class="navbar-brand" href="{{ url('/') }}">TechMart</a> -->
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{ asset('image/logo.png') }}" alt="TechMart Logo" class="logo" height="80">
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ url('/') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('products') ? 'active' : '' }}" href="{{ route('products') }}">Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('category') ? 'active' : '' }}" href="{{ route('category') }}">Categories</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('cart') ? 'active' : '' }}" href="{{ route('cart') }}">Cart</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('checkout') ? 'active' : '' }}" href="{{ route('checkout') }}">Checkout</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('blog') ? 'active' : '' }}" href="{{ route('blog') }}">Blog</a>
                </li>
            </ul>

            <form class="d-flex" action="{{ url('/search') }}" method="GET" role="search">
                <input class="form-control me-2" type="search" name="query" placeholder="Search products..." aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>
</div>