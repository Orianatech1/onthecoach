<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;
use Throwable;

class EnquiryController extends Controller
{
    public function store(Request $request)
    {
        $services = [
            'Airport Transfers',
            'Corporate Travel',
            'School Trips',
            'Weddings & Events',
            'Private Group Travel',
            'Other',
        ];

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:150'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:30'],

            'service' => [
                'nullable',
                'string',
                Rule::in($services),
            ],

            'vehicle' => ['nullable', 'string', 'max:150'],

            'journey_type' => [
                'required',
                Rule::in(['one_way', 'return']),
            ],

            'pickup' => ['required', 'string', 'max:255'],
            'destination' => ['required', 'string', 'max:255'],

            'travel_date' => [
                'required',
                'date',
                'after_or_equal:today',
            ],

            'return_date' => [
                'nullable',
                'required_if:journey_type,return',
                'date',
                'after_or_equal:travel_date',
            ],

            'passengers' => [
                'required',
                'integer',
                'min:1',
                'max:1000',
            ],

            'message' => ['nullable', 'string', 'max:3000'],

            'source' => [
                'nullable',
                'string',
                Rule::in([
                    'home',
                    'header_popup',
                    'fleet',
                    'services',
                    'contact',
                ]),
            ],
        ]);

        $sourceLabels = [
            'home' => 'Home Page',
            'header_popup' => 'Header Quote Popup',
            'fleet' => 'Fleet Page',
            'services' => 'Services Page',
            'contact' => 'Contact Page',
        ];

        $source = $validated['source'] ?? 'unknown';

        $data = [
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'] ?? 'Not provided',
            'service' => $validated['service'] ?? 'Not specified',
            'vehicle' => $validated['vehicle'] ?? 'Not specified',
            'journey_type' => $validated['journey_type'],
            'journey_label' => $validated['journey_type'] === 'return'
                ? 'Return Journey'
                : 'One Way',
            'pickup' => $validated['pickup'],
            'destination' => $validated['destination'],
            'travel_date' => $validated['travel_date'],
            'return_date' => $validated['return_date'] ?? 'Not applicable',
            'passengers' => $validated['passengers'],
            'message' => $validated['message'] ?? 'No additional message',
            'source' => $sourceLabels[$source] ?? 'Website',
        ];

        $emailBody = implode("\n", [
            'NEW WEBSITE ENQUIRY',
            '===================',
            '',
            'Enquiry Source: ' . $data['source'],
            '',
            'CUSTOMER DETAILS',
            'Name: ' . $data['name'],
            'Email: ' . $data['email'],
            'Phone: ' . $data['phone'],
            '',
            'JOURNEY DETAILS',
            'Journey Type: ' . $data['journey_label'],
            'Service: ' . $data['service'],
            'Vehicle: ' . $data['vehicle'],
            'Pickup: ' . $data['pickup'],
            'Destination: ' . $data['destination'],
            'Departure Date: ' . $data['travel_date'],
            'Return Date: ' . $data['return_date'],
            'Passengers: ' . $data['passengers'],
            '',
            'ADDITIONAL MESSAGE',
            $data['message'],
            '',
            'Please contact the customer to follow up.',
        ]);

        try {
            Mail::raw($emailBody, function ($mail) use ($data) {
                $mail->to('bookings@onthecoach.co.uk')
                    ->subject('New Website Enquiry - ' . $data['name'])
                    ->replyTo($data['email'], $data['name']);
            });
        } catch (Throwable $exception) {
            Log::error('OnTheCoach enquiry email failed.', [
                'source' => $source,
                'email' => $data['email'],
                'exception' => $exception->getMessage(),
            ]);

            $errorMessage =
                'Sorry, we could not send your enquiry right now. Please try again later or contact us directly.';

            if ($request->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => $errorMessage,
                ], 500);
            }

            return redirect()->back()
                ->withInput()
                ->with('mail_error', $errorMessage);
        }

        $successMessage =
            'Thank you for your enquiry! We have received your request and our team will get in touch with you shortly.';

        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => $successMessage,
            ]);
        }

        return redirect()->back()
            ->with('success', $successMessage);
    }
}
