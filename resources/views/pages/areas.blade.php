
@extends('layouts.app')

@section('title', 'Areas We Serve | OnTheCoach')
@section('description', 'Explore coach and minibus hire options for your group journey with OnTheCoach.')

@section('content')

<!-- Page Banner -->
<section class="page-banner">
    <div class="container">
        <span class="section-eyebrow">OUR COVERAGE</span>
        <h1>Areas We Serve</h1>
        <p>Planning group travel? Tell us your pickup location and destination.</p>
    </div>
</section>

<!-- Introduction -->
<section class="section-padding">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6">
                <span class="section-eyebrow">YOUR JOURNEY STARTS HERE</span>
                <h2 class="about-title">
                    Coach and minibus hire for your journey
                </h2>
                <p class="about-copy">
                    Whether you are arranging an airport transfer, a corporate
                    trip, a school outing or transport for a special occasion,
                    share your journey details with us to explore suitable
                    coach and minibus hire options.
                </p>
                <p class="about-copy">
                    Enter your pickup point, destination, travel date and
                    passenger count when making an enquiry. This helps us
                    understand your requirements and identify suitable options.
                </p>

                <a href="{{ route('contact') }}" class="btn btn-brand mt-3">
                    Enquire About Your Journey
                    <i class="bi bi-arrow-right ms-2"></i>
                </a>
            </div>

            <div class="col-lg-6">
                <div class="coverage-card">
                    <div class="coverage-icon">
                        <i class="bi bi-geo-alt"></i>
                    </div>
                    <h3>Where do you need to go?</h3>
                    <p>
                        Tell us your starting point and destination. We can
                        then review your transport requirements.
                    </p>

                    <div class="coverage-feature">
                        <i class="bi bi-check-circle-fill"></i>
                        Airport transfers
                    </div>
                    <div class="coverage-feature">
                        <i class="bi bi-check-circle-fill"></i>
                        Business and corporate journeys
                    </div>
                    <div class="coverage-feature">
                        <i class="bi bi-check-circle-fill"></i>
                        School trips and group outings
                    </div>
                    <div class="coverage-feature">
                        <i class="bi bi-check-circle-fill"></i>
                        Weddings and special events
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- How It Works -->
<section class="section-padding bg-light">
    <div class="container">
        <div class="section-heading text-center">
            <span class="section-eyebrow">GET STARTED</span>
            <h2>Arrange your journey in three steps</h2>
            <p>Share a few details so we can understand what you need.</p>
        </div>

        <div class="row g-4 mt-3">
            <div class="col-md-4">
                <div class="benefit-card h-100">
                    <div class="coverage-step">01</div>
                    <h3>Share Your Route</h3>
                    <p>
                        Provide your pickup location, destination and travel
                        date.
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="benefit-card h-100">
                    <div class="coverage-step">02</div>
                    <h3>Tell Us Your Needs</h3>
                    <p>
                        Let us know your passenger count and the type of
                        vehicle or journey you require.
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="benefit-card h-100">
                    <div class="coverage-step">03</div>
                    <h3>Discuss Your Enquiry</h3>
                    <p>
                        Contact us to discuss the available options for
                        your proposed journey.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="section-padding">
    <div class="container">
        <div class="about-cta">
            <div>
                <h2>Have a destination in mind?</h2>
                <p>
                    Send us your journey details to get started with your
                    coach or minibus hire enquiry.
                </p>
            </div>

            <a href="{{ route('contact') }}" class="btn btn-light btn-lg flex-shrink-0">
                Contact Us
                <i class="bi bi-arrow-right ms-2"></i>
            </a>
        </div>
    </div>
</section>

@endsection
