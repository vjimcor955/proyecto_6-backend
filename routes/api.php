<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SongController;
use App\Http\Controllers\AlbumController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/songs', [SongController::class, 'index']);
Route::get('/songs/{song}', [SongController::class, 'show']);
Route::post('/songs', [SongController::class, 'store']);
// Route::put('/songs/{song}', [SongController::class, 'update']);
Route::delete('/songs/{song}', [SongController::class, 'destroy']);


Route::get('/albums', [AlbumController::class, 'index']);
Route::get('/albums/{album}', [AlbumController::class, 'show']);
Route::post('/albums', [AlbumController::class, 'store']);
// Route::put('/songs/{song}', [AlbumController::class, 'update']);
Route::delete('/albums/{album}', [AlbumController::class, 'destroy']);
