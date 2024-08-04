<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomCon;
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


Route::get('/rooms', [RoomCon::class, 'index']);
Route::post('/rooms', [RoomCon::class, 'store']);
Route::put('/rooms/{id}', [RoomCon::class, 'update']);
Route::delete('/rooms/{id}', [RoomCon::class, 'destroy']);
Route::get('/beds/{id}', [RoomCon::class, 'getbed']);