<?php

use Illuminate\Support\Facades\Route;
use SchulzeFelix\SearchConsole\Period;
use SchulzeFelix\SearchConsole\SearchConsoleFacade as SearchConsole;
use Tipoff\Addresses\Http\Livewire\DomesticAddressSearchBar;
use Tipoff\GoogleApi\Facades\GoogleOauth;
use Tipoff\GoogleApi\GoogleServices;
use Tipoff\GoogleApi\Http\Controllers\GoogleOauthController;

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

Route::get('/test', function () {
    return view('test');
});

Route::get('/testjs', function () {
    return view('testjs');
});

Route::get('/get-phone', function () {
    return view('get-phone');
});

Route::get('test-google-oauth', function () {
    $url = route('google-oauth.connect', [
        'identifier' => 'google-console',
        'home_url'   => url('google-oauth/get'),
        //'scopes'     => [
        //    Google_Service_SearchConsole::WEBMASTERS_READONLY,
        //    //Google_Service_SearchConsole::WEBMASTERS // Read and write
        //]
    ]);

    return '<a href="' . $url . '">Connect to Google</a>';
});

Route::get('oauth/gmail/callback', [GoogleOauthController::class, 'handleCallback']);

Route::get('google-oauth/get', function () {
    dd(GoogleOauth::setIdentifier('google-console')->accessToken());
});

Route::get('search-console', function () {
    // Get access token.
    $accessToken = GoogleOauth::accessToken('google-console');

    /** @var GoogleServices $googleServices */
    $googleServices = app(GoogleServices::class)->setAccessToken($accessToken);

    $searchConsole = $googleServices->searchConsole()->listSites();

    dd($searchConsole);
});

//Route::get('gcs', function () {
//    //$sites = \Tipoff\Seo\Facades\Seo::listSites();
//    $sites = \Tipoff\Seo\Facades\Seo::getQueries(
//        'https://tuikhoeconban.com/',
//        now()->subDays(30),
//        now()->subDays(2)
//    );
//
//    dd($sites);
//
//});
