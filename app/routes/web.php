<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistrationController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.base', [
        'menu' => config ('top.menu'),
        'currentPage' => 'Main'
    ]);
})->name ('base');

Route::get('/about', function () {
    return view('pages.about', [
        'menu' => config ('top.menu'),
        'currentPage' => 'About'
    ]);
})->name ('about');

Route::get('/service', function () {
    return view('pages.service', [
        'menu' => config ('top.menu'),
        'currentPage' => 'Services'
    ]);
})->name ('service');

Route::get('/contact', function () {
    return view('pages.contact', [
        'menu' => config ('top.menu'),
        'currentPage' => 'Contact Us'
    ]);
})->name ('contact');

Route::get('/registration',
    [RegistrationController::class, 'index'],
)->name('registration');

Route::post('/registration', [
        RegistrationController::class, 'store']
)->name('registration.store');

Route::get('/login', [LoginController::class, 'index'])->name('login');

Route::post('/login', [LoginController::class, 'up'])->name('login.up');

Route::post('/reset-password', [LoginController::class, 'resetPassword'])->name('login.resetPassword');
