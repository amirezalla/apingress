<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::prefix('/user')->group(function () {

    Route::put('/signup', [UsersController::class, 'signup']);

    Route::middleware(['auth:sanctum'])->group(function () {

        Route::post('/logout', [UsersController::class, 'logout']);
        Route::get('/profile', [UsersController::class, 'profile']);
        Route::post('/update-profile', [UsersController::class, 'update']);
        Route::post('/upload-image', [UsersController::class, 'uploadImage']);
        Route::post('/upload-cover', [UsersController::class, 'uploadCover']);

    });

    
});





