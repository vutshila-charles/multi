<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::middleware(['auth:sanctum','throttle:30,1'])->get('/products', [App\Http\Controllers\API\ProductController::class, 'index']);
Route::middleware(['auth:sanctum','throttle:30,1'])->post('/products', [App\Http\Controllers\API\ProductController::class, 'store']);
Route::middleware(['auth:sanctum','throttle:30,1'])->get('/products/{id}', [App\Http\Controllers\API\ProductController::class, 'show']);
Route::middleware(['auth:sanctum','throttle:30,1'])->post('/products/update/{id}', [App\Http\Controllers\API\ProductController::class, 'update']);
Route::middleware(['auth:sanctum','throttle:30,1'])->delete('/products/{id}', [App\Http\Controllers\API\ProductController::class, 'destroy']);
