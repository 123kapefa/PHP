<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('base', [
        'menu' => config ('top.menu'),
        'currentPage' => 'Main'
    ]);
});

Route::get('/about', function () {
    return view('about', [
        'menu' => config ('top.menu'),
        'currentPage' => 'About'
    ]);
});

Route::get('/service', function () {
    return view('service', [
        'menu' => config ('top.menu'),
        'currentPage' => 'Services'
    ]);
});

Route::get('/contact', function () {
    return view('contact', [
        'menu' => config ('top.menu'),
        'currentPage' => 'Contact Us'
    ]);
});
