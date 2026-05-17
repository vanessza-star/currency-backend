<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\HistoryController; // ДОДАНО: імпорт твого контролера історії
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

// Публічні роути (доступні всім)
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Захищені роути (доступні тільки після авторизації)
Route::middleware('auth:sanctum')->group(function () {
    // Аутентифікація
    Route::post('/logout', [AuthController::class, 'logout']);
    
    // Роути для обраних валют (Favorites)
    Route::get('/favorites', [FavoriteController::class, 'index']);
    Route::post('/favorites', [FavoriteController::class, 'store']);
    Route::delete('/favorites/{id}', [FavoriteController::class, 'destroy']);

    // ДОДАНО: Роути для історії конвертацій (ConversionHistory)
    Route::get('/conversion-history', [HistoryController::class, 'index']); // Для сторінки Історії
    Route::post('/conversion-history', [HistoryController::class, 'store']); // Для кнопки "Save calculation"
});