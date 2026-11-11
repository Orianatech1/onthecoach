<!DOCTYPE html>
<html lang="en-GB">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'OnTheCoach | UK Coach Hire')</title>
    <meta name="description" content="@yield('meta_description', 'Discover coach and minibus hire for group travel, events and journeys across the UK.')">
    <meta name="theme-color" content="#a51f45">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    @stack('styles')
</head>
<body>

    @include('components.header')

    <main>
        @yield('content')
        
{{-- Shared Get a Quote Modal --}}
<div
    class="modal fade"
    id="quoteModal"
    tabindex="-1"
    aria-labelledby="quoteModalLabel"
    aria-hidden="true"
>
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">

            <div class="modal-header">
                <div>
                    <h5 class="modal-title" id="quoteModalLabel">
                        Get a Quote
                    </h5>
                    <p class="text-muted small mb-0">
                        Tell us about your journey and we'll get back to you.
                    </p>
                </div>

                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                ></button>
            </div>

            <div class="modal-body">
                @include('components.enquiry-form', [
                    'formId' => 'quote-enquiry-form',
                    'source' => 'header_popup',
                    'vehicle' => '',
                    'service' => '',
                ])
            </div>

        </div>
    </div>
</div>

    </main>

    @include('components.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" defer></script>
    <script src="{{ asset('assets/js/main.js') }}" defer></script>
    @stack('scripts')
</body>
</html>
```