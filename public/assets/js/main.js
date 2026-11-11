
document.addEventListener('DOMContentLoaded', function () {

    /* =====================================================
       1. BOOKING FORM ELEMENTS
    ===================================================== */

    const bookingForm = document.getElementById('homeBookingForm');
    const departureDate = document.getElementById('booking_date');
    const returnDate = document.getElementById('booking_return_date');
    const returnDateField = document.getElementById('returnDateField');
    const submitButton = document.getElementById('bookingSubmit');

    const journeyTypeInputs = document.querySelectorAll(
        'input[name="journey_type"]'
    );


    /* =====================================================
       2. DEPARTURE AND RETURN DATE VALIDATION
    ===================================================== */

    function getLocalDate() {
        const today = new Date();

        const year = today.getFullYear();
        const month = String(today.getMonth() + 1).padStart(2, '0');
        const day = String(today.getDate()).padStart(2, '0');

        return `${year}-${month}-${day}`;
    }

    function getJourneyType() {
        const selectedJourney = document.querySelector(
            'input[name="journey_type"]:checked'
        );

        return selectedJourney ? selectedJourney.value : 'one_way';
    }

    function updateJourneyFields() {

        if (!returnDate || !returnDateField) {
            return;
        }

        const isReturnJourney = getJourneyType() === 'return';

        const minimumDate = departureDate && departureDate.value
            ? departureDate.value
            : getLocalDate();

        // Show or hide return date.
        returnDateField.hidden = !isReturnJourney;

        // Enable or disable return date.
        returnDate.disabled = !isReturnJourney;

        // Make return date mandatory only for return journeys.
        returnDate.required = isReturnJourney;

        // Return date cannot be earlier than departure date.
        returnDate.min = minimumDate;

        if (!isReturnJourney) {
            returnDate.value = '';
        } else if (
            returnDate.value &&
            returnDate.value < minimumDate
        ) {
            returnDate.value = '';
        }
    }

    if (departureDate) {

        departureDate.min = getLocalDate();

        departureDate.addEventListener('change', function () {
            updateJourneyFields();
        });
    }

    journeyTypeInputs.forEach(function (input) {
        input.addEventListener('change', updateJourneyFields);
    });

    updateJourneyFields();


    /* =====================================================
       3. PHOTON LOCATION AUTOCOMPLETE
    ===================================================== */

    const locationInputs = [
        document.getElementById('booking_pickup'),
        document.getElementById('booking_destination')
    ].filter(Boolean);


    function getLocationName(feature) {

        const properties = feature.properties || {};
        const parts = [];

        if (properties.name) {
            parts.push(properties.name);
        }

        if (properties.street && properties.street !== properties.name) {
            parts.push(properties.street);
        }

        if (properties.district) {
            parts.push(properties.district);
        }

        if (properties.city) {
            parts.push(properties.city);
        } else if (properties.town) {
            parts.push(properties.town);
        } else if (properties.village) {
            parts.push(properties.village);
        }

        if (properties.state) {
            parts.push(properties.state);
        }

        if (properties.country) {
            parts.push(properties.country);
        }

        return [...new Set(parts.filter(Boolean))].join(', ');
    }


    function setupLocationAutocomplete(input) {

        const wrapper = input.closest('.booking-field');

        if (!wrapper) {
            return;
        }

        wrapper.style.position = 'relative';

        const suggestionsBox = document.createElement('div');

        suggestionsBox.className = 'location-suggestions';
        suggestionsBox.style.display = 'none';

        wrapper.appendChild(suggestionsBox);

        let debounceTimer = null;
        let activeController = null;
        let selectedIndex = -1;
        let currentSuggestions = [];


        function closeSuggestions() {

            suggestionsBox.style.display = 'none';
            suggestionsBox.innerHTML = '';

            currentSuggestions = [];
            selectedIndex = -1;
        }


        function selectSuggestion(feature) {

            const locationName = getLocationName(feature);

            if (locationName) {
                input.value = locationName;

                input.dispatchEvent(
                    new Event('change', { bubbles: true })
                );
            }

            closeSuggestions();
        }


        function highlightSuggestion(index) {

            const items = suggestionsBox.querySelectorAll(
                '.location-suggestion'
            );

            items.forEach(function (item, itemIndex) {

                item.classList.toggle(
                    'active',
                    itemIndex === index
                );

            });

            selectedIndex = index;
        }


        function displaySuggestions(features) {

            suggestionsBox.innerHTML = '';

            currentSuggestions = features;
            selectedIndex = -1;

            if (!features.length) {
                closeSuggestions();
                return;
            }

            features.forEach(function (feature, index) {

                const locationName = getLocationName(feature);

                if (!locationName) {
                    return;
                }

                const item = document.createElement('div');

                item.className = 'location-suggestion';
                item.textContent = locationName;
                item.setAttribute('role', 'option');

                // Select location without triggering input blur first.
                item.addEventListener('mousedown', function (event) {

                    event.preventDefault();

                    selectSuggestion(feature);

                });

                item.addEventListener('mouseenter', function () {
                    highlightSuggestion(index);
                });

                suggestionsBox.appendChild(item);

            });

            suggestionsBox.style.display =
                suggestionsBox.children.length ? 'block' : 'none';
        }


        async function searchLocations(query) {

            if (activeController) {
                activeController.abort();
            }

            activeController = new AbortController();

            const url = new URL(
                'https://photon.komoot.io/api/'
            );

            url.searchParams.set('q', query);
            url.searchParams.set('limit', '6');
            url.searchParams.set('lang', 'en');

            try {

                const response = await fetch(url.toString(), {
                    signal: activeController.signal,
                    headers: {
                        'Accept': 'application/json'
                    }
                });

                if (!response.ok) {
                    throw new Error('Location search failed.');
                }

                const data = await response.json();

                displaySuggestions(data.features || []);

            } catch (error) {

                if (error.name !== 'AbortError') {

                    console.error(
                        'Photon autocomplete error:',
                        error
                    );

                    closeSuggestions();
                }
            }
        }


        // Search when the user enters at least 3 characters.
        input.addEventListener('input', function () {

            const query = input.value.trim();

            clearTimeout(debounceTimer);

            if (query.length < 3) {

                closeSuggestions();

                if (activeController) {
                    activeController.abort();
                }

                return;
            }

            debounceTimer = setTimeout(function () {
                searchLocations(query);
            }, 350);

        });


        // Keyboard navigation.
        input.addEventListener('keydown', function (event) {

            if (suggestionsBox.style.display === 'none') {
                return;
            }

            const items = suggestionsBox.querySelectorAll(
                '.location-suggestion'
            );

            if (!items.length) {
                return;
            }

            if (event.key === 'ArrowDown') {

                event.preventDefault();

                const nextIndex =
                    selectedIndex < items.length - 1
                        ? selectedIndex + 1
                        : 0;

                highlightSuggestion(nextIndex);
            }

            if (event.key === 'ArrowUp') {

                event.preventDefault();

                const previousIndex =
                    selectedIndex > 0
                        ? selectedIndex - 1
                        : items.length - 1;

                highlightSuggestion(previousIndex);
            }

            if (event.key === 'Enter' && selectedIndex >= 0) {

                event.preventDefault();

                const selectedFeature =
                    currentSuggestions[selectedIndex];

                if (selectedFeature) {
                    selectSuggestion(selectedFeature);
                }
            }

            if (event.key === 'Escape') {
                closeSuggestions();
            }

        });


        // Close suggestions when clicking outside the input.
        input.addEventListener('blur', function () {
            setTimeout(closeSuggestions, 150);
        });


        // Reopen suggestions when focusing the input.
        input.addEventListener('focus', function () {

            if (
                input.value.trim().length >= 3 &&
                suggestionsBox.children.length
            ) {
                suggestionsBox.style.display = 'block';
            }

        });

    }


    locationInputs.forEach(setupLocationAutocomplete);


    /* =====================================================
       4. BOOKING FORM SUBMISSION
    ===================================================== */

    if (bookingForm) {

        bookingForm.addEventListener('submit', function (event) {

            // Validate all required fields.
            if (!bookingForm.checkValidity()) {

                event.preventDefault();

                bookingForm.reportValidity();

                return;
            }

            // Prevent multiple submissions.
            if (submitButton) {

                submitButton.disabled = true;

                submitButton.innerHTML =
                    'Submitting... <i class="bi bi-arrow-repeat"></i>';
            }

        });

    }

});
