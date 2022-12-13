<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('job-detail');
});

Route::get('/jobs', function () {
    return view('job');
});
