<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExampleController;

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


Route::get('/test', function () {
    return view('test');
});
Route::post('/test', [ExampleController::class, 'store'])->name('submit-form');

Route::get('/testjs', function () {
    return view('testjs');   
});

Route::get('/testphone', function () {
    return view('testphone');
});

Route::get('/', function () {
    $current = null;
    $marketreviews = null;
    $reviews = app('review')::all();
    $escapeThemes = app('escaperoom_theme')::all();
    $markets = app('market')::all();

    return view('website.index', [
        'market' => $current,
        'reviews' => $current ? $marketreviews : $reviews,
        'html' => null, // set to true if need to use html page instead of AMP
        'title' => 'The Great Escape Room',
        'subtitle' => 'Voted #1 Escape Room across America - A truly innovative experience that will keep you coming back for more!',
        'cta' => true,
        'seotitle' => 'The Great Escape Room',
        'seodescription' => 'The Great Escape Room is one of the premier operations in the escape room industry. Come see why we have been rated so high!',
        'ogtitle' => 'The Great Escape Room',
        'ogdescription' => 'The Great Escape Room is one of the premier operations in the escape room industry. Come see why we have been rated so high!',
        'canonical' => 'https://thegreatescaperoom.com',
        'image' => url('img/hero/tger.jpg'),
        'ogimage' => url('img/ogimage.jpg'),

        'allescapethemes' => $escapeThemes, 
        'navmarkets' => $markets,
        'navescapethemes' => $escapeThemes,
        'allmarkets' => $markets,
        'footerthemes' => $escapeThemes,
        'flmarkets' => app('market')::where('state_id', 1)->get(),
        'midmarkets' => app('market')::where('state_id', 2)->get(),
        'nemarkets' => app('market')::where('state_id', 3)->get(),
        
    ]);
});

Route::get('/contact', function() {
    return view('welcome');
})->name('contact');
Route::get('/bookings', function() {
    return view('welcome');
})->name('bookings');
Route::get('/reservations', function() {
    return view('welcome');
})->name('reservations');
Route::get('/rooms', function() {
    return view('welcome');
})->name('rooms');
Route::get('/team-building', function() {
    return view('welcome');
})->name('team-building');
Route::get('/on-the-run', function() {
    return view('welcome');
})->name('on-the-run');
Route::get('/parties', function() {
    return view('welcome');
})->name('parties');
Route::get('/faq', function() {
    return view('welcome');
})->name('faq');
Route::get('/employment', function() {
    return view('welcome');
})->name('employment');
Route::get('/gifts', function() {
    return view('welcome');
})->name('gifts');
Route::get('/terms', function() {
    return view('welcome');
})->name('terms');
Route::get('/privacy', function() {
    return view('welcome');
})->name('privacy');
Route::get('/company', function() {
    return view('welcome');
})->name('company');