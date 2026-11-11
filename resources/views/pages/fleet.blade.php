@extends('layouts.app')

@section('title', 'Our Fleet | OnTheCoach.co.uk')

@section('meta_description', 'Explore coach and minibus hire options for group travel, business journeys and special occasions across the UK.')

@section('content')

{{-- =========================================================
     FLEET PAGE BANNER
========================================================= --}}
<section class="fleet-page-banner">
    <div class="container">
        <span class="eyebrow">TRAVEL YOUR WAY</span>
        <h1>Our Fleet</h1>

        <nav aria-label="Breadcrumb" class="fleet-breadcrumb">
            <a href="{{ url('/') }}">Home</a>
            <i class="bi bi-chevron-right"></i>
            <span>Our Fleet</span>
        </nav>
    </div>
</section>

{{-- =========================================================
     FLEET INTRODUCTION
========================================================= --}}
<section class="section-padding fleet-intro-section">
    <div class="container">

        <div class="fleet-intro-grid">
            <div class="fleet-intro-copy">
                <span class="eyebrow text-brand">COMFORTABLE GROUP TRAVEL</span>
                <h2>Modern &amp; Comfortable Vehicles</h2>
                <p>
                    We offer a range of modern coaches and minibuses to suit
                    every type of journey, from small group travel to large
                    events. All vehicles are selected to support comfortable,
                    convenient group travel.
                </p>
            </div>

            <div class="fleet-intro-features">
                <div><i class="bi bi-check-circle-fill"></i> Modern vehicle options</div>
                <div><i class="bi bi-check-circle-fill"></i> Comfortable seating</div>
                <div><i class="bi bi-check-circle-fill"></i> Options for different group sizes</div>
                <div><i class="bi bi-check-circle-fill"></i> Helpful enquiry support</div>
            </div>
        </div>

        @php
            $fleet = [
                [
                    'name' => 'Minibus Hire',
                    'capacity' => '8–16 Passengers',
                    'image' => 'minibus.jpeg',
                    'description' => 'Ideal for small groups, airport transfers, corporate travel and local journeys.',
                    'features' => ['Air Conditioning', 'Comfortable Seating', 'Luggage Space', 'Professional Driver'],
                ],
                [
                    'name' => 'Midi Coaches',
                    'capacity' => '17–33 Passengers',
                    'image' => 'midi-coach.jpeg',
                    'description' => 'Perfect for medium-sized groups, school trips and events.',
                    'features' => ['Air Conditioning', 'Comfortable Seating', 'Luggage Space', 'Professional Driver'],
                ],
                [
                    'name' => 'Executive Coaches',
                    'capacity' => 'Capacity varies',
                    'image' => 'executive-coach.jpeg',
                    'description' => 'Premium travel options for corporate and private group journeys.',
                    'features' => ['Executive Travel', 'Comfortable Seating', 'Luggage Space', 'Professional Driver'],
                ],
                [
                    'name' => 'Luxury Coaches',
                    'capacity' => '49+ Passengers',
                    'image' => 'luxury-coach.jpeg',
                    'description' => 'Spacious options for longer journeys, tours and large groups.',
                    'features' => ['Comfortable Seating', 'Air Conditioning', 'Luggage Space', 'Professional Driver'],
                ],
            ];
        @endphp

        {{-- =====================================================
             VEHICLE LIST
        ====================================================== --}}
        <div class="fleet-list">

            @foreach ($fleet as $vehicle)
                <article class="fleet-list-card">

                    <div class="fleet-list-image-wrap">
                        <img
                            src="{{ asset('assets/images/' . $vehicle['image']) }}"
                            alt="{{ $vehicle['name'] }}"
                            class="fleet-list-image"
                            loading="lazy"
                        >
                    </div>

                    <div class="fleet-list-content">
                        <h3>{{ $vehicle['name'] }}</h3>

                        <div class="fleet-list-capacity">
                            <i class="bi bi-bus-front-fill" aria-hidden="true"></i>
                            <span>{{ $vehicle['capacity'] }}</span>
                        </div>

                        <p>{{ $vehicle['description'] }}</p>

                        <a href="{{ route('contact', ['vehicle' => $vehicle['name']]) }}"
                           class="btn btn-brand fleet-quote-btn">
                            Get a Quote
                        </a>
                    </div>

                    <ul class="fleet-list-features">
                        @foreach ($vehicle['features'] as $feature)
                            <li>
                                <i class="bi bi-snow" aria-hidden="true"></i>
                                <span>{{ $feature }}</span>
                            </li>
                        @endforeach
                    </ul>

                </article>
            @endforeach

        </div>

        {{-- =====================================================
             FLEET CTA
        ====================================================== --}}
        <div class="fleet-help-banner">
            <div class="fleet-help-icon">
                <i class="bi bi-bus-front-fill" aria-hidden="true"></i>
            </div>

            <div class="fleet-help-copy">
                <h3>Not sure which vehicle is right for you?</h3>
                <p>Our team can help you choose the best option for your journey.</p>
            </div>

            <a href="{{ route('contact') }}" class="btn btn-brand">
                Get in Touch
            </a>
        </div>

    </div>
</section>

{{-- =========================================================
     CUSTOMER TESTIMONIALS
========================================================= --}}
<section class="fleet-testimonials section-padding">
    <div class="container">

        <div class="section-heading text-center">
            <h2>What Our Customers Say</h2>
            <p>Feedback from customers about their journeys.</p>
        </div>

        <div class="row g-4 mt-3">

            @foreach ([
                [
                    'quote' => 'Excellent service from start to finish. The coach was clean, comfortable and arrived on time.',
                    'name' => 'Corporate Travel Customer',
                    'type' => 'Corporate Travel'
                ],
                [
                    'quote' => 'A convenient option for our group journey. The enquiry process was straightforward.',
                    'name' => 'Group Travel Customer',
                    'type' => 'Group Travel'
                ],
                [
                    'quote' => 'A comfortable travel option for our special event. The journey went smoothly.',
                    'name' => 'Event Travel Customer',
                    'type' => 'Events'
                ],
            ] as $testimonial)

                <div class="col-md-4">
                    <article class="fleet-testimonial-card h-100">
                        <div class="fleet-testimonial-stars" aria-label="5 out of 5 stars">
                            ★★★★★
                        </div>

                        <p>“{{ $testimonial['quote'] }}”</p>

                        <div class="fleet-testimonial-person">
                            <strong>{{ $testimonial['name'] }}</strong>
                            <span>{{ $testimonial['type'] }}</span>
                        </div>
                    </article>
                </div>

            @endforeach

        </div>
    </div>
</section>

@endsection
