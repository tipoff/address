<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\Site\MarketController;
use App\Http\Controllers\Web\Site\Pages\Booking\SlotsController;
use App\Http\Controllers\Web\Site\Pages\TeamBuildingController; // TBD


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

/*Route::get('/book-online', function () {
    return view('website/layout-booking');
});*/


Route::prefix('company')->group(function () {
    Route::get('company')->name('company');
    //Route::get('/', CompanyController::class)->name('company');

    Route::get('terms')->name('terms');
    Route::get('privacy')->name('privacy');
    Route::get('rooms')->name('rooms');
    //Route::get('rooms/{theme}', ThemesController::class)->name('themes');
    //Route::get('precautions', PrecautionsController::class)->name('precautions');

    Route::get('employment', function () {
        return view('welcome');
    })->name('employment');
    //Route::get('employment', EmploymentController::class)->name('employment');

    Route::get('team-building', function () {
        return view('welcome');
    })->name('team-building');
    //Route::get('team-building', TeamBuildingController::class)->name('team-building');

    Route::get('on-the-run', function () {
        return view('welcome');
    })->name('on-the-run');
    //Route::get('on-the-run', OnTheRunController::class)->name('on-the-run');

    Route::get('private-parties', function () {
        return view('welcome');
    })->name('parties');
    //Route::get('private-parties', PartiesController::class)->name('parties');

    Route::get('contact', function () {
        return view('welcome');
    })->name('contact');
    //Route::get('contact', ContactController::class)->name('contact');

    Route::get('gift-certificates', function () {
        return view('welcome');
    })->name('gifts');
    //Route::get('gift-certificates', GiftsController::class)->name('gifts');

    Route::get('faq')->name('faq');


     Route::get('reservations', function () {
        return view('welcome');
    })->name('reservations');
    //Route::get('reservations', ReservationsController::class)->name('reservations');

    Route::get('/book-online', SlotsController::class)->name('bookings');
});

Route::prefix('{market}')->group(function () {
    Route::prefix('book-online')->group(function () {
        /*Route::post('cart-items/{location?}', [CartItemsController::class, 'store'])->name('bookings.holds.store');
        Route::delete('cart-items/{slotNumber}/{location?}', [CartItemsController::class, 'destroy'])->name('bookings.holds.destroy');
        Route::get('contact-details/{location?}', [ContactDetailsController::class, 'create'])->name('bookings.contact-details.create');
        Route::post('contact-details/{location?}', [ContactDetailsController::class, 'store'])->name('bookings.contact-details.store');
        Route::post('voucher-applications/{location?}', [VoucherApplicationsController::class, 'store'])->name('bookings.voucher-applications.store');
        Route::post('discount-applications/{location?}', [DiscountApplicationsController::class, 'store'])->name('bookings.discount-applications.store');
        Route::get('checkout/{location?}', [CheckoutController::class, 'create'])->name('bookings.checkout.create');
        Route::post('checkout/{location?}', [CheckoutController::class, 'store'])->name('bookings.checkout.store');
        Route::get('thanks/{location?}', [PurchaseCompletedController::class, 'show'])->name('bookings.complete');
        */
        Route::get('{location?}', SlotsController::class)->name('bookings.slots.index');
    });
});

Route::fallback(MarketController::class)->name('market');

