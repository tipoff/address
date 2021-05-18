<?php

use Illuminate\Support\Facades\Route;
use Tipoff\Addresses\Http\Livewire\DomesticAddressSearchBar;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {
    return view('test');
});
Route::post('/test', [ExampleController::class, 'store'])->name('submit-form');

Route::get('/testjs', function () {
    return view('testjs');   
});

