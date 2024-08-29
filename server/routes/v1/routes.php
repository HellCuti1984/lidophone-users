<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::prefix('auth')->group(function() {
    Route::get('/privet', [UserController::class, 'index']);
});

Route::middleware('auth:sanctum')->group(function() {
        Route::resource('users', UserController::class)->except(['create', 'edit']);
    }
);