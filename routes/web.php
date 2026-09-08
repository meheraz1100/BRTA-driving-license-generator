<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\RegistrationController;

// Route::get('/register', [RegistrationController::class, 'create'])
//     ->name('register');

// Route::post('/register', [RegistrationController::class, 'store'])
//     ->name('register.store');

use App\Http\Controllers\RegistrationController;

Route::get('/register', [RegistrationController::class, 'create'])
    ->name('register');

Route::post('/register', [RegistrationController::class, 'store'])
    ->name('register.store');

Route::get('/application/{application}/success', [RegistrationController::class, 'success'])
    ->name('application.success');

Route::get('/application/{application}/license', [RegistrationController::class, 'license'])
    ->name('application.license');