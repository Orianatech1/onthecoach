
@extends('layouts.app')

@section('title', 'Contact Us | OnTheCoach')
@section('description', 'Contact OnTheCoach about coach hire, minibus hire, group transport and travel enquiries.')

@section('content')

<!-- Page Banner -->
<section class="page-banner">
    <div class="container">
        <span class="section-eyebrow">WE'RE HERE TO HELP</span>
        <h1>Contact Us</h1>
        <p>Tell us about your journey and transport requirements.</p>
    </div>
</section>

<!-- Contact Section -->
<section class="section-padding">
    <div class="container">
        <div class="row g-5">

            <!-- Contact Information -->
            <div class="col-lg-5">
                <span class="section-eyebrow">GET IN TOUCH</span>
                <h2 class="about-title">Let's plan your journey</h2>

                <p class="about-copy">
                    Whether you need a coach for a group trip, a minibus for
                    an event or transport for a business journey, send us
                    your requirements using the form.
                </p>

                <div class="contact-info-card">
                    <div class="contact-info-icon">
                        <i class="bi bi-envelope"></i>
                    </div>
                    <div>
                        <h3>Email Enquiries</h3>
                        <p>Use the enquiry form to share your requirements.</p>
                    </div>
                </div>

                <div class="contact-info-card">
                    <div class="contact-info-icon">
                        <i class="bi bi-geo-alt"></i>
                    </div>
                    <div>
                        <h3>Journey Details</h3>
                        <p>Include your pickup location and destination.</p>
                    </div>
                </div>

                <div class="contact-info-card">
                    <div class="contact-info-icon">
                        <i class="bi bi-clock"></i>
                    </div>
                    <div>
                        <h3>Travel Information</h3>
                        <p>Share your preferred date, time and passenger count.</p>
                    </div>
                </div>
            </div>

            <!-- Enquiry Form UI -->
            <div class="col-lg-7">
                <div class="contact-form-card">
                    <h2>Send an Enquiry</h2>
                    <p class="contact-form-intro">
                        Complete the details below and tell us what you need.
                    </p>

                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if (session('mail_error'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('mail_error') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger" role="alert">
                            <strong>Please correct the following:</strong>
                            <ul class="mb-0 mt-2">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('enquiry.store') }}" method="POST">
    @csrf
                        <div class="row g-3">

                            <div class="col-md-6">
                                <label for="name" class="form-label">Full Name *</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="name"
                                    name="name"
                                    value="{{ old('name') }}"
                                    placeholder="Enter your full name"
                                    required
                                >
                            </div>

                            <div class="col-md-6">
                                <label for="email" class="form-label">Email Address *</label>
                                <input
                                    type="email"
                                    class="form-control"
                                    id="email"
                                    name="email"
                                    value="{{ old('email') }}"
                                    placeholder="you@example.com"
                                    required
                                >
                            </div>

                            <div class="col-md-6">
                                <label for="phone" class="form-label">Phone Number</label>
                                <input
                                    type="tel"
                                    class="form-control"
                                    id="phone"
                                    name="phone"
                                    value="{{ old('phone') }}"
                                    placeholder="Enter your phone number"
                                >
                            </div>

                            <div class="col-md-6">
                                <label for="service" class="form-label">Service Required *</label>
                                <select
                                    class="form-select"
                                    id="service"
                                    name="service"
                                    required
                                >
                                    <option value="">Select a service</option>
                                    <option value="Airport Transfers" @selected(old('service', request('service')) === 'Airport Transfers')>Airport Transfers</option>
                                    <option value="Corporate Travel" @selected(old('service', request('service')) === 'Corporate Travel')>Corporate Travel</option>
                                    <option value="School Trips" @selected(old('service', request('service')) === 'School Trips')>School Trips</option>
                                    <option value="Weddings & Events" @selected(old('service', request('service')) === 'Weddings & Events')>Weddings & Events</option>
                                    <option value="Private Group Travel" @selected(old('service', request('service')) === 'Private Group Travel')>Private Group Travel</option>
                                    <option value="Other" @selected(old('service', request('service')) === 'Other')>Other</option>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label for="vehicle" class="form-label">Vehicle Type</label>
                                <select class="form-select" id="vehicle" name="vehicle">
                                    <option value="">No preference / Not sure</option>
                                    <option value="Minibus Hire" @selected(old('vehicle', request('vehicle')) === 'Minibus Hire')>Minibus Hire</option>
                                    <option value="Midi Coaches" @selected(old('vehicle', request('vehicle')) === 'Midi Coaches')>Midi Coaches</option>
                                    <option value="Executive Coaches" @selected(old('vehicle', request('vehicle')) === 'Executive Coaches')>Executive Coaches</option>
                                    <option value="Luxury Coaches" @selected(old('vehicle', request('vehicle')) === 'Luxury Coaches')>Luxury Coaches</option>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label for="pickup" class="form-label">Pickup Location *</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="pickup"
                                    name="pickup"
                                    value="{{ old('pickup', request('pickup')) }}"
                                    placeholder="Enter pickup location"
                                    required
                                >
                            </div>

                            <div class="col-md-6">
                                <label for="destination" class="form-label">Destination *</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="destination"
                                    name="destination"
                                    value="{{ old('destination', request('destination')) }}"
                                    placeholder="Enter destination"
                                    required
                                >
                            </div>

                            <div class="col-md-6">
                                <label for="travel_date" class="form-label">Travel Date *</label>
                                <input
                                    type="date"
                                    class="form-control"
                                    id="travel_date"
                                    name="travel_date"
                                    value="{{ old('travel_date', request('travel_date')) }}" min="{{ now()->format('Y-m-d') }}"
                                    required
                                >
                            </div>

                            <div class="col-md-6">
                                <label for="passengers" class="form-label">Number of Passengers *</label>
                                <input
                                    type="number"
                                    class="form-control"
                                    id="passengers"
                                    name="passengers"
                                    value="{{ old('passengers', request('passengers')) }}"
                                    min="1"
                                    max="1000"
                                    placeholder="e.g. 25"
                                    required
                                >
                            </div>

                            <div class="col-12">
                                <label for="message" class="form-label">Additional Requirements</label>
                                <textarea
                                    class="form-control"
                                    id="message"
                                    name="message"
                                    rows="4"
                                    placeholder="Tell us about return travel, luggage or other requirements"
                                >{{ old('message') }}</textarea>
                            </div>

                            <div class="col-12">
                                <button type="submit" class="btn btn-brand btn-lg w-100">
                                    Submit Enquiry
                                    <i class="bi bi-arrow-right ms-2"></i>
                                </button>
                            </div>

                        </div>
                    </form>

                    <p class="contact-privacy-note">
                        Please provide accurate details so your enquiry can
                        be reviewed appropriately.
                    </p>
                </div>
            </div>

        </div>
    </div>
</section>

@endsection
