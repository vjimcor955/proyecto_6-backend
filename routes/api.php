<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SongController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\AuthController;

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

// User endpoints
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Api endpoints protected by sanctum
Route::group([
    'middleware' => ['auth:sanctum']
], function () {
    // Song endpoints
    Route::get('/songs', [SongController::class, 'index']);
    Route::get('/songs/{song}', [SongController::class, 'show']);
    Route::post('/songs', [SongController::class, 'store']);
    Route::delete('/songs/{song}', [SongController::class, 'destroy']);

    // Album endpoints
    Route::get('/albums', [AlbumController::class, 'index']);
    Route::get('/albums/{album}', [AlbumController::class, 'show']);
    Route::post('/albums', [AlbumController::class, 'store']);
    Route::delete('/albums/{album}', [AlbumController::class, 'destroy']);
});