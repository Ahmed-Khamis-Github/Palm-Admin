<?php

use App\Http\Controllers\API\Authentication\CompanyLogin;
use App\Http\Controllers\API\Authentication\CompanyRegister;
use App\Http\Controllers\API\Authentication\UserLogin;
use App\Http\Controllers\API\Authentication\UserRegister;
use Illuminate\Http\Request;
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
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

 // user auth 

Route::post('user-register', [UserRegister::class, 'register']);

Route::post('user-login', [UserLogin::class, 'login']);


// company auth 

Route::post('company-register', [CompanyRegister::class, 'register']);

Route::post('company-login', [CompanyLogin::class, 'login']);
