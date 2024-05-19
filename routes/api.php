<?php

use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\SubscribeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/rate-custom', [CurrencyController::class, 'exchange']);

Route::get('/rate', [CurrencyController::class, 'fixedRate']);

Route::post('/subscribe', [SubscribeController::class, 'subscribe']);

