<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\language\LanguageController;
use App\Http\Controllers\pages\HomePage;
use App\Http\Controllers\pages\Page2;
use App\Http\Controllers\pages\MiscError;
use App\Http\Controllers\authentications\LoginBasic;
use App\Http\Controllers\authentications\RegisterBasic;
use App\Http\Controllers\Dashboard\CompanyController;
use App\Http\Controllers\Dashboard\OrderController;
use App\Http\Controllers\Dashboard\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Main Page Route
Route::get('/page-2', [Page2::class, 'index'])->name('pages-page-2');

// locale
Route::get('lang/{locale}', [LanguageController::class, 'swap']);

// pages
Route::get('/pages/misc-error', [MiscError::class, 'index'])->name('pages-misc-error');


Route::middleware(['auth'])->group(function () {
    // Landing page route
    Route::get('/', [HomePage::class, 'index'])->name('pages-home');

    // Users resource routes
    Route::resource('users', UserController::class);

    // Companies resource routes
    Route::resource('companies', CompanyController::class);

    // orders routes 
    Route::resource('orders', OrderController::class);
});


//auth routes 
Route::get('login', [LoginBasic::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginBasic::class, 'authenticate']);
Route::post('logout', [LoginBasic::class, 'logout'])->name('logout');
