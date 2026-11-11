
@extends('layouts.app')

@section('title', 'Coach Hire Services Across the UK | OnTheCoach')

@section('meta_description', 'Explore coach and minibus hire for airport transfers, corporate travel, school trips, weddings and events across the UK.')

@section('content')

<section class="page-banner">
    <div class="container">
        <span class="eyebrow">HOW CAN WE HELP?</span>
        <h1>Our Services</h1>
        <p>Group transport solutions for journeys, events and special occasions.</p>

        <nav aria-label="Breadcrumb">
            <a href="{{ route('home') }}">Home</a>
            <span>/</span>
            <span>Services</span>
        </nav>
    </div>
</section>

<section class="section-padding">
    <div class="container">

        <div class="section-heading text-center mb-5">
            <span class="eyebrow text-brand">TRAVEL MADE SIMPLE</span>
            <h2>Transport for Every Occasion</h2>
            <p>Tell us about your journey and the transport your group needs.</p>
        </div>

        @php
            $services = [
                [
                    'icon' => 'bi-airplane',
                    'title' => 'Airport Transfers',
                    'description' => 'Arrange group transport to or from the airport, with pickup and destination details tailored to your journey.',
                    'features' => [
                        'Group airport journeys',
                        'Pickup and drop-off planning',
                        'Transport for different group sizes'
                    ],
                    'slug' => 'airport-transfers'
                ],
                [
                    'icon' => 'bi-briefcase',
                    'title' => 'Corporate Travel',
                    'description' => 'Explore coach and minibus hire options for business meetings, conferences, team outings and corporate events.',
                    'features' => [
                        'Business group transport',
                        'Conference and event travel',
                        'Journey planning for teams'
                    ],
                    'slug' => 'corporate-travel'
                ],
                [
                    'icon' => 'bi-mortarboard',
                    'title' => 'School Trips',
                    'description' => 'Plan group transport for school outings, educational visits and organised group activities.',
                    'features' => [
                        'Educational group trips',
                        'Transport for school outings',
                        'Vehicle options for group sizes'
                    ],
                    'slug' => 'school-trips'
                ],
                [
                    'icon' => 'bi-calendar-event',
                    'title' => 'Weddings & Events',
                    'description' => 'Make group travel easier for weddings, family celebrations, private events and special occasions.',
                    'features' => [
                        'Wedding guest transport',
                        'Private celebrations',
                        'Group journeys to venues'
                    ],
                    'slug' => 'weddings-events'
                ]
            ];
        @endphp

        <div class="row g-4">
            @foreach ($services as $service)
                <div class="col-md-6">
                    <article class="service-detail-card h-100">

                        <div class="service-detail-icon">
                            <i class="bi {{ $service['icon'] }}"></i>
                        </div>

                        <h2>{{ $service['title'] }}</h2>

                        <p class="service-detail-description">
                            {{ $service['description'] }}
                        </p>

                        <ul class="service-feature-list">
                            @foreach ($service['features'] as $feature)
                                <li>
                                    <i class="bi bi-check-circle-fill"></i>
                                    {{ $feature }}
                                </li>
                            @endforeach
                        </ul>

                        <a href="{{ route('contact', ['service' => $service['title']]) }}"
                           class="btn btn-brand">
                            Enquire About This Service
                            <i class="bi bi-arrow-right"></i>
                        </a>

                    </article>
                </div>
            @endforeach
        </div>

    </div>
</section>

<section class="why-section section-padding">
    <div class="container">
        <div class="section-heading text-center">
            <span class="eyebrow text-brand">YOUR JOURNEY STARTS HERE</span>
            <h2>A Simple Way to Get Started</h2>
            <p>Share a few details about your transport requirements.</p>
        </div>

        <div class="row g-4 mt-3">
            <div class="col-md-4">
                <div class="benefit-card">
                    <i class="bi bi-chat-square-text"></i>
                    <h3>1. Tell Us Your Plans</h3>
                    <p>Share your destination, travel date and group size.</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="benefit-card">
                    <i class="bi bi-bus-front"></i>
                    <h3>2. Discuss Your Needs</h3>
                    <p>Tell us about the journey and the vehicle you need.</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="benefit-card">
                    <i class="bi bi-send"></i>
                    <h3>3. Submit an Enquiry</h3>
                    <p>Send your requirements to start the enquiry process.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="cta-section">
    <div class="container">
        <div class="cta-card">
            <div>
                <span class="eyebrow">PLANNING A GROUP JOURNEY?</span>
                <h2>Let's talk about your trip.</h2>
                <p>Share your requirements through our contact page.</p>
            </div>

            <a href="{{ route('contact') }}" class="btn btn-light btn-lg">
                Request a Quote
                <i class="bi bi-arrow-right"></i>
            </a>
        </div>
    </div>
</section>

@endsection
