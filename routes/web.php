<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookmarkController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/jobs');
});

// Jobs Route
Route::get('/job/{id}', [JobController::class, 'detail']);
Route::get('/jobs/bookmark', [BookmarkController::class, 'index']);
Route::get('/jobs', [JobController::class, 'index']);

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
    Route::get('{id}/jobs',[JobController::class, 'company_jobs']);
});

// Bookmark Routes
Route::post('/bookmark/{id}', [BookmarkController::class, 'bookmark']);

// Auth Routes
Route::get('profile',[AuthController::class, "profile"])->middleware('isLoggedIn');
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
