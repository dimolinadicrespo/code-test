<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('concerts',                        [\App\Http\Controllers\ConcertController::class, 'store'])->name('api.concerts.store');
Route::post('concerts/{concert}/bands/{band}',       [\App\Http\Controllers\ConcertBandsController::class, 'store'])->name('api.concerts.bands.store');
Route::post('concerts/{concert}/advertisers/{advertiser}', [\App\Http\Controllers\ConcertAdvertisersController::class, 'store'])->name('api.concerts.advertisers.store');
