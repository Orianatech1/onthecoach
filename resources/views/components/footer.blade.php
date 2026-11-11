
<footer class="site-footer">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-5">
                <a href="{{ url('/') }}" class="footer-brand">OnTheCoach<span>.co.uk</span></a>
                <p class="footer-text">
                    <p>OntheCoachHire is subsidary Essex Tours Ltd.
 Registered in England and Wales</p>
                    Coach and minibus hire for group journeys, events and travel
                    across the UK.
                </p>
            </div>

            <div class="col-6 col-lg-3">
                <h2 class="footer-heading">Quick Links</h2>
                <ul class="footer-links">
                    <li><a href="{{ url('/fleet') }}">Our Fleet</a></li>
                    <li><a href="{{ url('/services') }}">Services</a></li>
                    <li><a href="{{ url('/about') }}">About Us</a></li>
                    <li><a href="{{ url('/contact') }}">Contact</a></li>
                </ul>
            </div>

            <div class="col-6 col-lg-4">
                <h2 class="footer-heading">Get in Touch</h2>
                <p class="footer-text">
                    Contact our team for help planning your journey.
                </p>
                <a href="{{ url('/contact') }}" class="btn btn-outline-light">
                    Request a Quote
                </a>
            </div>
        </div>

        <div class="footer-bottom">
            <p class="mb-0">&copy; {{ date('Y') }} Essex Tours Ltd. All Rights Reserved.</p>
        </div>
    </div>
</footer>
