
<header class="site-header">
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}" aria-label="OnTheCoach home">
                <img src="{{ asset('assets/images/onthecoach-logo.png') }}"
                     alt="OnTheCoach.co.uk"
                     class="site-logo">
            </a>

            <button class="navbar-toggler" type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#mainNavigation"
                    aria-controls="mainNavigation"
                    aria-expanded="false"
                    aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="mainNavigation">
                <ul class="navbar-nav ms-auto align-items-lg-center">
                    <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/fleet') }}">Our Fleet</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/services') }}">Services</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/about') }}">About Us</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/areas-we-serve') }}">Areas We Serve</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/contact') }}">Contact</a></li>
                    <li class="nav-item ms-lg-3">
                        <button
    type="button"
    class="btn btn-brand"
    data-bs-toggle="modal"
    data-bs-target="#quoteModal"
    data-enquiry-source="header_popup"
>
    Get a Quote
</button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
