<?php

use Illuminate\Support\Facades\Route;
use Tipoff\Addresses\Http\Livewire\DomesticAddressSearchBar;

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

Route::get('/test', DomesticAddressSearchBar::class);

Route::get('/testjs', function () {
    return view('test');   
});
