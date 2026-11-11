
@php
    $formId = $formId ?? 'enquiry-form';
    $source = $source ?? 'header_popup';
    $vehicle = $vehicle ?? '';
    $selectedService = $service ?? request('service', '');
@endphp

<form
    id="{{ $formId }}"
    action="{{ route('enquiry.store') }}"
    method="POST"
    class="enquiry-form"
    data-enquiry-form
>
    @csrf

    <input type="hidden" name="source" value="{{ $source }}">
    <input type="hidden" name="vehicle" value="{{ $vehicle }}">

    <div
        class="enquiry-feedback alert d-none"
        data-enquiry-feedback
        role="status"
        aria-live="polite"
    ></div>

    <div class="row g-3">

        {{-- Customer name --}}
        <div class="col-md-6">
            <label for="{{ $formId }}-name" class="form-label">
                Full Name *
            </label>
            <input
                type="text"
                class="form-control"
                id="{{ $formId }}-name"
                name="name"
                value="{{ old('name') }}"
                maxlength="150"
                autocomplete="name"
                required
            >
        </div>

        {{-- Email --}}
        <div class="col-md-6">
            <label for="{{ $formId }}-email" class="form-label">
                Email Address *
            </label>
            <input
                type="email"
                class="form-control"
                id="{{ $formId }}-email"
                name="email"
                value="{{ old('email') }}"
                maxlength="255"
                autocomplete="email"
                required
            >
        </div>

        {{-- Phone --}}
        <div class="col-md-6">
            <label for="{{ $formId }}-phone" class="form-label">
                Phone Number
            </label>
            <input
                type="tel"
                class="form-control"
                id="{{ $formId }}-phone"
                name="phone"
                value="{{ old('phone') }}"
                maxlength="30"
                autocomplete="tel"
            >
        </div>

        {{-- Service --}}
        <div class="col-md-6">
            <label for="{{ $formId }}-service" class="form-label">
                Service *
            </label>
            <select
                class="form-select"
                id="{{ $formId }}-service"
                name="service"
                required
            >
                <option value="">Select a service</option>

                @foreach ([
                    'Airport Transfers',
                    'Corporate Travel',
                    'School Trips',
                    'Weddings & Events',
                    'Private Group Travel',
                    'Other',
                ] as $serviceOption)
                    <option
                        value="{{ $serviceOption }}"
                        @selected($selectedService === $serviceOption)
                    >
                        {{ $serviceOption }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Pickup --}}
        <div class="col-md-6">
            <label for="{{ $formId }}-pickup" class="form-label">
                Pickup Location *
            </label>
            <input
                type="text"
                class="form-control"
                id="{{ $formId }}-pickup"
                name="pickup"
                value="{{ old('pickup') }}"
                maxlength="255"
                required
            >
        </div>

        {{-- Destination --}}
        <div class="col-md-6">
            <label for="{{ $formId }}-destination" class="form-label">
                Destination *
            </label>
            <input
                type="text"
                class="form-control"
                id="{{ $formId }}-destination"
                name="destination"
                value="{{ old('destination') }}"
                maxlength="255"
                required
            >
        </div>

        {{-- Travel date --}}
        <div class="col-md-6">
            <label for="{{ $formId }}-travel-date" class="form-label">
                Travel Date *
            </label>
            <input
                type="date"
                class="form-control"
                id="{{ $formId }}-travel-date"
                name="travel_date"
                value="{{ old('travel_date') }}"
                min="{{ now()->toDateString() }}"
                required
            >
        </div>

        {{-- Passenger count --}}
        <div class="col-md-6">
            <label for="{{ $formId }}-passengers" class="form-label">
                Number of Passengers *
            </label>
            <input
                type="number"
                class="form-control"
                id="{{ $formId }}-passengers"
                name="passengers"
                value="{{ old('passengers', 1) }}"
                min="1"
                max="1000"
                step="1"
                required
            >
        </div>

        {{-- Additional message --}}
        <div class="col-12">
            <label for="{{ $formId }}-message" class="form-label">
                Additional Requirements
            </label>
            <textarea
                class="form-control"
                id="{{ $formId }}-message"
                name="message"
                rows="4"
                maxlength="3000"
                placeholder="Tell us about your journey or any special requirements."
            >{{ old('message') }}</textarea>
        </div>

        {{-- Validation errors --}}
        <div class="col-12 d-none" data-enquiry-errors>
            <div class="alert alert-danger mb-0" role="alert"></div>
        </div>

        {{-- Submit --}}
        <div class="col-12">
            <button type="submit" class="btn btn-brand w-100">
                <span data-submit-label>Send Enquiry</span>
                <span
                    class="spinner-border spinner-border-sm ms-2 d-none"
                    data-submit-spinner
                    aria-hidden="true"
                ></span>
            </button>

            <p class="small text-muted mt-2 mb-0">
                Your details will only be used to respond to your enquiry.
            </p>
        </div>

    </div>
</form>
