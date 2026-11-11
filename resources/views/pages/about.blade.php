
@extends('layouts.app')

@section('title', 'About Us | OnTheCoach')
@section('description', 'Learn about OnTheCoach and our approach to reliable coach and minibus hire for group travel, business journeys and special occasions.')

@section('content')

<!-- Page Banner -->
<section class="page-banner">
    <div class="container">
        <span class="section-eyebrow">GET TO KNOW US</span>
        <h1>About OnTheCoach</h1>
        <p>Making group travel simpler, more comfortable and easier to organise.</p>
    </div>
</section>

<!-- About Content -->
<section class="section-padding">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6">
                <img
                    src="{{ asset('assets/images/hero-coach.jpg') }}"
                    alt="Luxury coach for group travel"
                    class="about-image"
                >
            </div>

            <div class="col-lg-6">
                <span class="section-eyebrow">WHO WE ARE</span>

                <h2 class="about-title">
                    Group travel, made easier.
                </h2>

                <p class="about-copy">
                    At OnTheCoach, we aim to make arranging group transport
                    straightforward. Whether you are planning a corporate
                    journey, an airport transfer, a school trip or a special
                    event, finding suitable transport should be simple.
                </p>

                <p class="about-copy">
                    Our platform helps customers explore coach and minibus
                    hire options for their journeys. We focus on making the
                    enquiry process clear, convenient and tailored to your
                    travel requirements.
                </p>

                <p class="about-copy">
                    From small groups to larger parties, we want to help you
                    plan your journey with confidence and spend less time
                    worrying about transport arrangements.
                </p>

                <a href="{{ route('contact') }}" class="btn btn-brand mt-3">
                    Discuss Your Journey
                    <i class="bi bi-arrow-right ms-2"></i>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Our Values -->
<section class="section-padding bg-light">
    <div class="container">
        <div class="section-heading text-center">
            <span class="section-eyebrow">WHAT MATTERS TO US</span>
            <h2>A better way to plan group travel</h2>
            <p>Our approach is built around the needs of every journey.</p>
        </div>

        <div class="row g-4 mt-3">
            <div class="col-md-4">
                <div class="benefit-card h-100">
                    <div class="benefit-icon">
                        <i class="bi bi-people"></i>
                    </div>
                    <h3>Travel Together</h3>
                    <p>
                        Explore transport options that help keep your group
                        together throughout the journey.
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="benefit-card h-100">
                    <div class="benefit-icon">
                        <i class="bi bi-calendar-check"></i>
                    </div>
                    <h3>Simple Planning</h3>
                    <p>
                        Share your journey details and requirements to make
                        arranging group transport more straightforward.
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="benefit-card h-100">
                    <div class="benefit-icon">
                        <i class="bi bi-shield-check"></i>
                    </div>
                    <h3>Clear Communication</h3>
                    <p>
                        We aim to make it easier to communicate your travel
                        needs and understand the available options.
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
                <h2>Planning your next group journey?</h2>
                <p>
                    Tell us where you are going, when you need to travel
                    and how many passengers are in your group.
                </p>
            </div>

            <a href="{{ route('contact') }}" class="btn btn-light btn-lg flex-shrink-0">
                Get in Touch
                <i class="bi bi-arrow-right ms-2"></i>
            </a>
        </div>
    </div>
</section>

@endsection
