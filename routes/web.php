<?php

use Illuminate\Support\Facades\Route;
Route::get('/', function () {
    return view('welcome');
});

Route::get('/listitem/{id}', function() {
    return view('welcome');
});

Route::get('/signin', function () {
    return view('welcome');
});

Route::get('/register', function (){
    return view('welcome');
});