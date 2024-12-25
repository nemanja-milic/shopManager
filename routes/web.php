<?php

use App\Http\Controllers\StoreController;
use Illuminate\Support\Facades\Route;

Route::view("/login", "login")->name("login");

Route::middleware("auth")->group(function(){
    Route::post('/store/add', [StoreController::class, "store"]);
});
