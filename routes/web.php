<?php

use Illuminate\Support\Facades\Route;
Route::get('/', function () {
    return view('welcome');
});

Route::get('/listitem/{id}', function() {
    return view('welcome');
});

