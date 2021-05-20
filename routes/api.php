<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AvailabilityController;
use App\Http\Controllers\Api\ThemesController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('availability/{locationSlug}', [AvailabilityController::class, 'indexByLocationSlug']);
Route::get('availability/{locationSlug}/{slotNumber}', [AvailabilityController::class, 'findByLocationSlug']);
Route::put('availability/{location:slug}/{slotNumber}/hold', [AvailabilityController::class, 'setHold']);
Route::get('availability/{locationSlug}/{slotNumber}/hold', [AvailabilityController::class, 'getHold']);
Route::delete('availability/{locationSlug}/{slotNumber}/hold', [AvailabilityController::class, 'deleteHold']);
Route::resource('themes', ThemesController::class)->only('index');

