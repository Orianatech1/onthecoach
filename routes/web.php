<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EnquiryController;
// Website pages
Route::view('/', 'pages.home')->name('home');

Route::view('/fleet', 'pages.fleet')->name('fleet');

Route::view('/services', 'pages.services')->name('services');

Route::view('/about', 'pages.about')->name('about');

Route::view('/areas-we-serve', 'pages.areas')->name('areas');

Route::view('/contact', 'pages.contact')->name('contact');

// Shared enquiry handler for all website forms
Route::post('/enquiry', [EnquiryController::class, 'store'])
    ->middleware('throttle:5,1')
    ->name('enquiry.store');
