<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopinglistController;
use App\Http\Controllers\listItemsController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/ShopingLists', [ShopinglistController::class, 'index']);
Route::prefix('/list')->group(function () {
    Route::post('/store',[ShopinglistController::class,'store']);
    Route::put('/{id}',[ShopinglistController::class,'update']);
    Route::delete('/{id}',[ShopinglistController::class,'destroy']);
});

Route::get('/listitems', [listItemsController::class,'index']);
Route::prefix('/items')->group(function () {
    Route::post('/store/{id}',[listItemscontroller::class,'store']);
    Route::delete('/{id}',[listItemscontroller::class,'destroy']);
});