<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\StoreController;
use Illuminate\Support\Facades\Route;

Route::view("/login", "login")->name("login");
Route::post("/login", [AuthController::class, "login"]);

Route::middleware("auth")->group(function(){
    Route::view("/", "dashboard");
    Route::get("/store/add", [StoreController::class, "create"]);
    Route::post('/store/add', [StoreController::class, "store"]);
});
