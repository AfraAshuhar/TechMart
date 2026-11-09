<footer class="footer mt-5">
    <div class="container py-4">
        <div class="row">

            <!-- Brand -->
            <div class="col-md-4 mb-3">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('image/logo.png') }}" alt="TechMart Logo" class="logo">
                </a>
                <p class="footer-text">
                    Your trusted place for quality tech products, blogs, and smart shopping.
                </p>
            </div>

            <!-- Quick Links -->
            <div class="col-md-4 mb-3">
                <h5 class="footer-title">Quick Links</h5>
                <ul class="footer-links">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li><a href="{{ route('products') }}">Products</a></li>
                    <li><a href="{{ route('blog') }}">Blog</a></li>
                    <li><a href="{{ route('cart') }}">Cart</a></li>
                </ul>
            </div>

            <!-- Contact -->
            <div class="col-md-4 mb-3">
                <h5 class="footer-title">Contact</h5>
                <p>Email: support@techmart.com</p>
                <p>Phone: +94 77 123 4567</p>
            </div>

        </div>

        <hr class="footer-line">

        <div class="text-center footer-bottom">
            © {{ date('Y') }} TechMart. All rights reserved.
        </div>
    </div>
</footer>