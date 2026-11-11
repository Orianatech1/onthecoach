
@extends('layouts.app')

@section('title', 'OnTheCoach | Coach & Minibus Hire Across the UK')

@section('meta_description', 'Explore coach and minibus hire for group travel, corporate journeys, school trips and special events across the UK.')

@section('content')

{{-- =========================================================
     HERO SECTION
========================================================= --}}
<div class="home-hero-wrap">

<section class="hero-section">
    <div class="hero-overlay"></div>

    <div class="container hero-content">
        <div class="row">
            <div class="col-lg-8 col-xl-7">

                <span class="eyebrow">
                    RELIABLE COACH HIRE ACROSS THE UK
                </span>

                <h1>Your Journey.<br><span>Our Priority.</span></h1>

                <p class="hero-description">
                    Comfortable group travel, with a simple way to plan
                    your next journey.
                </p>

                <div class="hero-benefits">
                    <span><i class="bi bi-bus-front"></i> Group Travel</span>
                    <span><i class="bi bi-shield-check"></i> Service You Can Trust</span>
                    <span><i class="bi bi-people"></i> Travel Together</span>
                </div>

                <a href="#quote-form" class="btn btn-brand btn-lg mt-3">
                    Get a Free Quote
                    <i class="bi bi-arrow-right"></i>
                </a>

            </div>
        </div>
    </div>
</section>


{{-- =========================================================
     TWO-STEP HOME BOOKING FORM
========================================================= --}}

   
{{-- =========================================================
     ONE-STEP HOME BOOKING FORM
========================================================= --}}

<div class="container home-booking-bar-wrap" id="quote-form">
    <div class="home-booking-card">

        @if (session('success'))
            <div class="booking-success-message" role="status" aria-live="polite">
                <i class="bi bi-check-circle-fill" aria-hidden="true"></i>
                <div>
                    <strong>Thank you!</strong>
                    <p>{{ session('success') }}</p>
                </div>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger mb-3" role="alert">
                {{ session('error') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger mb-3" role="alert">
                Please check the form fields and correct any errors before submitting again.
            </div>
        @endif

        <form action="{{ route('enquiry.store') }}"
              method="POST"
              id="homeBookingForm"
              novalidate>

            @csrf

            <input type="hidden" name="source" value="home">

            {{-- JOURNEY TYPE --}}
            <div class="booking-journey-type mb-3">
                <label class="form-label">Journey Type</label>

                <div class="d-flex flex-wrap gap-3">
                    <label class="journey-option">
                        <input type="radio"
                               name="journey_type"
                               value="one_way"
                               {{ old('journey_type', 'one_way') === 'one_way' ? 'checked' : '' }}>
                        <span>One Way</span>
                    </label>

                    <label class="journey-option">
                        <input type="radio"
                               name="journey_type"
                               value="return"
                               {{ old('journey_type') === 'return' ? 'checked' : '' }}>
                        <span>Return Journey</span>
                    </label>
                </div>
            </div>

            {{-- JOURNEY DETAILS --}}
            <div class="booking-fields-row">

                <div class="booking-field">
                    <label for="booking_pickup">Pickup Location</label>
                    <input type="text"
                           id="booking_pickup"
                           name="pickup"
                           placeholder="Enter pickup location"
                           value="{{ old('pickup') }}"
                           maxlength="255"
                           required>
                </div>

                <div class="booking-field">
                    <label for="booking_destination">Destination</label>
                    <input type="text"
                           id="booking_destination"
                           name="destination"
                           placeholder="Enter destination"
                           value="{{ old('destination') }}"
                           maxlength="255"
                           required>
                </div>

                <div class="booking-field">
                    <label for="booking_date">Departure Date</label>
                    <input type="date"
                           id="booking_date"
                           name="travel_date"
                           value="{{ old('travel_date') }}"
                           required>
                </div>

                <div class="booking-field"
                     id="returnDateField"
                     @if (old('journey_type', 'one_way') !== 'return') hidden @endif>

                    <label for="booking_return_date">Return Date</label>
                    <input type="date"
                           id="booking_return_date"
                           name="return_date"
                           value="{{ old('return_date') }}"
                           @if (old('journey_type') !== 'return') disabled @endif
                           @if (old('journey_type') === 'return') required @endif>
                </div>

                <div class="booking-field">
                    <label for="booking_passengers">Passengers</label>
                    <select id="booking_passengers"
                            name="passengers"
                            required>
                        <option value="">Select passengers</option>

                        @for ($i = 1; $i <= 100; $i++)
                            <option value="{{ $i }}"
                                {{ (string) old('passengers') === (string) $i ? 'selected' : '' }}>
                                {{ $i }} {{ $i === 1 ? 'Passenger' : 'Passengers' }}
                            </option>
                        @endfor
                    </select>
                </div>

                <div class="booking-field">
                    <label for="booking_service">Trip Type</label>
                    <select id="booking_service"
                            name="service"
                            required>
                        <option value="">Select trip type</option>

                        @foreach ([
                            'Airport Transfers',
                            'Corporate Travel',
                            'School Trips',
                            'Weddings & Events',
                            'Private Group Travel',
                            'Other'
                        ] as $service)
                            <option value="{{ $service }}"
                                {{ old('service') === $service ? 'selected' : '' }}>
                                {{ $service }}
                            </option>
                        @endforeach
                    </select>
                </div>

            </div>

            <hr class="my-3">

            {{-- CUSTOMER DETAILS --}}
            <div class="booking-fields-row booking-customer-row">

                <div class="booking-field">
                    <label for="booking_name">Full Name</label>
                    <input type="text"
                           id="booking_name"
                           name="name"
                           placeholder="Your full name"
                           value="{{ old('name') }}"
                           maxlength="150"
                           required>
                </div>

                <div class="booking-field">
                    <label for="booking_phone">Phone Number</label>
                    <input type="tel"
                           id="booking_phone"
                           name="phone"
                           placeholder="Your phone number"
                           value="{{ old('phone') }}"
                           maxlength="30"
                           required>
                </div>

                <div class="booking-field">
                    <label for="booking_email">Email Address</label>
                    <input type="email"
                           id="booking_email"
                           name="email"
                           placeholder="you@example.com"
                           value="{{ old('email') }}"
                           maxlength="150"
                           required>
                </div>

                <div class="booking-field booking-action">
                    <label class="booking-label-spacer" aria-hidden="true">
                        Submit
                    </label>

                    <button type="submit"
                            class="btn btn-brand booking-submit-btn"
                            id="bookingSubmit">
                        Request a Quote
                        <i class="bi bi-arrow-right"></i>
                    </button>
                </div>

            </div>

            <p class="booking-privacy-note mt-2 mb-0">
                <i class="bi bi-shield-check"></i>
                Your information is safe with us. Our team will contact you shortly.
            </p>

        </form>
    </div>
</div>



</div>
<br><br><br>


{{-- =========================================================
     OUR FLEET
========================================================= --}}
<section class="section-padding">
    <div class="container">

        <div class="section-heading-row">
            <div class="section-heading">
                <span class="eyebrow text-brand">TRAVEL YOUR WAY</span>
                <h2>Our Fleet</h2>
                <p>Explore vehicle options for different group sizes.</p>
            </div>

            <a href="{{ url('/fleet') }}" class="text-link">
                View All Fleet
                <i class="bi bi-arrow-right"></i>
            </a>
        </div>

        <div class="row g-4">

            @foreach ([
                ['Minibus Hire', '8–16 Passengers', 'Ideal for small groups and local journeys.', 'minibus'],
                ['Midi Coaches', '17–33 Passengers', 'A practical choice for group trips.', 'midi-coach'],
                ['Executive Coaches', 'Vehicle capacity varies', 'For comfortable business and private travel.', 'executive-coach'],
                ['Luxury Coaches', 'Vehicle capacity varies', 'For longer journeys and special occasions.', 'luxury-coach']
            ] as [$name, $capacity, $description, $image])

                <div class="col-sm-6 col-lg-3">
                    <article class="fleet-card h-100">

                        <img
                            src="{{ asset('assets/images/'.$image.'.jpeg') }}"
                            alt="{{ $name }}"
                            loading="lazy"
                            onerror="this.style.display='none'"
                        >

                        <div class="fleet-card-body">
                            <h3>{{ $name }}</h3>

                            <p class="fleet-capacity">
                                <i class="bi bi-people"></i>
                                {{ $capacity }}
                            </p>

                            <p>{{ $description }}</p>

                            <a href="{{ url('/fleet') }}" class="text-link">
                                View Details
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>

                    </article>
                </div>

            @endforeach

        </div>
    </div>
</section>


{{-- =========================================================
     WHY CHOOSE ONTHECOACH
========================================================= --}}
<section class="why-section section-padding">
    <div class="container">

        <div class="section-heading text-center">
            <h2>Why Choose OnTheCoach?</h2>
        </div>

        <div class="row g-4 mt-3">

            @foreach ([
                ['bi-alarm-fill', 'Reliable & Punctual', 'We value your time.'],
                ['bi-bus-front-fill', 'Modern Vehicles', 'Clean, safe and comfortable.'],
                ['bi-people-fill', 'Experienced Drivers', 'Friendly and professional.'],
                ['bi-headset', 'Affordable Rates', 'Great value for all journeys.']
            ] as [$icon, $title, $description])

                <div class="col-6 col-lg-3">
                    <div class="benefit-card">
                        <i class="bi {{ $icon }}" aria-hidden="true"></i>
                        <h3>{{ $title }}</h3>
                        <p>{{ $description }}</p>
                    </div>
                </div>

            @endforeach

        </div>
    </div>
</section>



{{-- =========================================================
     OUR SERVICES
========================================================= --}}
<section class="section-padding">
    <div class="container">

        <div class="section-heading-row">
            <div class="section-heading">
                <span class="eyebrow text-brand">TRAVEL FOR EVERY OCCASION</span>
                <h2>Our Services</h2>
                <p>Tell us what you're planning and we'll help you enquire.</p>
            </div>

            <a href="{{ url('/services') }}" class="text-link">
                All Services
                <i class="bi bi-arrow-right"></i>
            </a>
        </div>

        <div class="row g-4">

            @foreach ([
                [
                    'bi-airplane',
                    'Airport Transfers',
                    'Plan group travel to or from the airport.',
                    'service-airport.png',
                    'Luxury coach at an airport terminal'
                ],
                [
                    'bi-briefcase',
                    'Corporate Travel',
                    'Transport options for business groups and events.',
                    'service-corporate.png',
                    'Executive coach outside a corporate office'
                ],
                [
                    'bi-mortarboard',
                    'School Trips',
                    'Plan transport for school outings and group trips.',
                    'service-school.png',
                    'Schoolchildren boarding a coach'
                ],
                [
                    'bi-calendar-event',
                    'Weddings & Events',
                    'Discuss transport for your special occasion.',
                    'service-weddings.png',
                    'Bride and groom beside a luxury coach'
                ]
            ] as [$icon, $title, $description, $image, $alt])

                <div class="col-sm-6 col-lg-3">
                    <article class="service-card h-100">

                        <img
                            src="{{ asset('assets/images/' . $image) }}"
                            alt="{{ $alt }}"
                            class="service-card-image"
                            loading="lazy"
                        >

                        <div class="service-icon">
                            <i class="bi {{ $icon }}"></i>
                        </div>

                        <h3>{{ $title }}</h3>
                        <p>{{ $description }}</p>

                        <a href="{{ url('/services') }}" class="text-link">
                            Learn More
                            <i class="bi bi-arrow-right"></i>
                        </a>

                    </article>
                </div>

            @endforeach

        </div>
    </div>
</section>

{{-- =========================================================
     FINAL CALL TO ACTION
========================================================= --}}
<section class="cta-section">
    <div class="container">

        <div class="cta-card">

            <div>
                <span class="eyebrow">
                    LET'S PLAN YOUR NEXT JOURNEY
                </span>

                <h2>Ready to travel together?</h2>

                <p>
                    Share your requirements with us to get started.
                </p>
            </div>

            <a href="#quote-form" class="btn btn-light btn-lg">
                Get a Quote
                <i class="bi bi-arrow-right"></i>
            </a>

        </div>

    </div>
</section>

@endsection
