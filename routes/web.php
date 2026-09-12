<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\ThemeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::post('/theme', [ThemeController::class, 'update'])
    ->name('theme.update');

/*
|--------------------------------------------------------------------------
| Authentication
|--------------------------------------------------------------------------
*/

Route::middleware('guest')->group(function () {

    Route::get('/register', [AuthController::class, 'showRegister'])
        ->name('register');

    Route::post('/register', [AuthController::class, 'register'])
        ->name('register.store');

    Route::get('/login', [AuthController::class, 'showLogin'])
        ->name('login');

    Route::post('/login', [AuthController::class, 'login'])
        ->name('login.store');
});

Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

/*
|--------------------------------------------------------------------------
| Application
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/my-applications', [RegistrationController::class, 'myApplications'])
        ->name('my-applications');

    Route::get('/application', [RegistrationController::class, 'create'])
        ->name('application');

    Route::post('/application', [RegistrationController::class, 'store'])
        ->name('application.store');

    Route::get('/application/{application}/success', [RegistrationController::class, 'success'])
        ->name('application.success');

    Route::get('/application/{application}/license', [RegistrationController::class, 'license'])
        ->name('application.license');
});

/*
|--------------------------------------------------------------------------
| Admin
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->group(function () {

        Route::get('/', [AdminController::class, 'index'])
            ->name('admin.dashboard');

        Route::post('/applications/{application}/approve', [AdminController::class, 'approve'])
            ->name('admin.applications.approve');

        Route::post('/applications/{application}/reject', [AdminController::class, 'reject'])
            ->name('admin.applications.reject');
    });


Route::get(
    '/application/{application}/license/pdf',
    [RegistrationController::class, 'licensePdf']
)->name('application.license.pdf');