<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;

Route::middleware('pin')->group(function () {
    Route::get('/', function () {
        return view('welcome');
    })->name('home');
});

Route::get('login', fn () => view('login'))->name('login');
