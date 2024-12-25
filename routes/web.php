<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;

Route::view("/login", "login")->name("login");
Route::post("/login", [AuthController::class, "login"]);

Route::middleware("auth")->group(function(){
    Route::view("/", "dashboard")->name("home");
    Route::get("/shops", [ShopController::class, "index"])->name("shops");
    Route::get("/shop/add", [ShopController::class, "create"])->name("view-add-shop");
    Route::post('/shop/add', [ShopController::class, "store"])->name("add-shop");
});
