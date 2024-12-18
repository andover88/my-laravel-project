<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::post('/posts', [PostController::class, 'store'])->middleware('auth:sanctum');

Route::get('/posts', [PostsController::class, 'index']);


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
