<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PublicArticleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'register']);
Route::get('/logout', [AuthController::class, 'logout']);

Route::get('/articles', [PublicArticleController::class, 'index']);
Route::get('/articles/{article}', [PublicArticleController::class, 'show']);

Route::middleware('auth_sanctum')->group(function () {
    Route::get('/me', [AuthController::class, 'me']);
    Route::apiResource('/me/articles', ArticleController::class);
});
