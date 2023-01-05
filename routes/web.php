<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\JobController;
use http\Env\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('job-detail');
});

// Jobs Route
Route::get('/jobs', function () {
    return view('job');
});

Route::prefix('/job')->group(function(){
    Route::get('register', function () {
        return view('job-register');
    });

    Route::post('register', [JobController::class, 'register']);
});

// Company Route
Route::get('/companies',[CompanyController::class, 'index']);

Route::prefix('/company/')->group(function(){
    Route::get('register', function () {
        return view('company-register');
    })->middleware(['companyMade']);
    Route::post('register',[CompanyController::class, 'store']);
    Route::get('{id}',[CompanyController::class, 'detail']);
});


// Auth Routes
Route::get('logout',[AuthController::class, "logout"]);
Route::group(['prefix'=>'/', 'middleware'=> 'isGuest'], function(){

    Route::group(['prefix'=> 'register'], function(){
        Route::get('/',[AuthController::class, "register_view"]);
        Route::post('/',[AuthController::class, "register"]);
    });

    Route::group(['prefix'=> 'login'], function(){
        Route::get('/', [AuthController::class, "login_view"]);
        Route::post('/', [AuthController::class, "login"]);
    });
});
