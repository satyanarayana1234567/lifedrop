<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DonorController;
use App\Http\Controllers\FeedbackController;

/*
|--------------------------------------------------------------------------
| Landing Page
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Home Page
|--------------------------------------------------------------------------
*/

Route::get('/home', [DonorController::class, 'home'])
    ->name('home');

/*
|--------------------------------------------------------------------------
| Donor Routes
|--------------------------------------------------------------------------
*/

Route::get('/register-donor', [DonorController::class, 'create'])
    ->name('donors.create');

Route::post('/register-donor', [DonorController::class, 'store'])
    ->name('donors.store');

Route::get('/find-donor', [DonorController::class, 'search'])
    ->name('donors.search');

Route::get('/donors', [DonorController::class, 'index'])
    ->name('donors.index');

/*
|--------------------------------------------------------------------------
| Feedback
|--------------------------------------------------------------------------
*/

Route::post('/feedback', [FeedbackController::class, 'store'])
    ->name('feedback.store');