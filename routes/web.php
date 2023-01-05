<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CompanyController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('job-detail');
});

Route::get('/jobs', function () {
    return view('job');
});

Route::get('/companies',[CompanyController::class, 'index']);

Route::get('/company/register', function () {
    return view('company-register');
});

Route::post('/company/register',[CompanyController::class, 'store']);

Route::get('/company/{id}',[CompanyController::class, 'detail']);

Route::get('/register',[AuthController::class, "register_view"]);
Route::get('/login', [AuthController::class, "login_view"]);

Route::post('/register',[AuthController::class, "register"]);
Route::post('/login', [AuthController::class, "login"]);
