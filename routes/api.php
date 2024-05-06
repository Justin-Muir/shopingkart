<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopinglistController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/ShopingLists', [ShopinglistController::class, 'index']);
Route::prefix('/list')->group(function () {
    Route::post('/store',[ShopinglistController::class,'store']);
    Route::put('/{id}',[ShopinglistController::class,'update']);
    Route::delete('/{id}',[ShopinglistController::class,'destroy']);
});
