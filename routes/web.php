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

Route::get('/company/{id}',[CompanyController::class, 'detail']);
