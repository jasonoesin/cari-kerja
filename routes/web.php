<?php

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

Route::get('/company/{id}',[CompanyController::class, 'detail']);


Route::get('/register', function () {
    return view('register');
});


