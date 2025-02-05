<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/charge/{amount}', [PaymentController::class, 'charge']);
Route::get('/refund/{amount}', [PaymentController::class, 'refund']);
