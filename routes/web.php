<?php

use App\Http\Controllers\ApplyController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookmarkController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/jobs');
});

// Application
Route::get('/applications', [ApplyController::class, 'index']);

// Jobs Route

Route::get('/jobs/bookmark', [BookmarkController::class, 'index'])->middleware('isLoggedIn');
Route::get('/jobs', [JobController::class, 'index']);

Route::prefix('/job')->group(function(){
    Route::get('register', function () {
        return view('job-register');
    });
    Route::post('register', [JobController::class, 'register']);
});

Route::get('/jobs/search', [JobController::class, 'search']);

Route::get('/job/{id}', [JobController::class, 'detail']);
Route::post('/job/{id}', [JobController::class, 'apply']);

// Company Route
Route::get('/companies',[CompanyController::class, 'index']);
Route::get('/companies/search',[CompanyController::class, 'search']);

Route::prefix('/company/')->group(function(){
    Route::get('register', function () {
        return view('company-register');
    })->middleware(['companyMade']);
    Route::post('register',[CompanyController::class, 'store']);
    Route::get('{id}',[CompanyController::class, 'detail']);
    Route::get('{id}/jobs',[JobController::class, 'company_jobs']);
    Route::get('{id}/applications',[ApplyController::class, 'company_applications']);
});

// Bookmark Routes
Route::post('/bookmark/{id}', [BookmarkController::class, 'bookmark'])->middleware('isLoggedIn');

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
