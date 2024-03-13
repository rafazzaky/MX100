<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\LamaranController;
use App\Http\Controllers\LowonganController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware(['auth:sanctum'])->group(function(){
    Route::get('/logout', [AuthenticationController::class, 'logout']);
    Route::get('/lowongan/{id}', [LowonganController::class, 'show']);
    Route::get('/lowongan/company/{id}', [LowonganController::class, 'showcompanyjobs']);
    Route::post('/lowongan', [LowonganController::class, 'store']);
    Route::post('/lamaran', [LamaranController::class, 'store']);
    Route::get('/lowongan/{id}/lamaran', [LamaranController::class, 'showbylowongan']);
});

Route::post('/login', [AuthenticationController::class, 'login']);
Route::get('/lowongan', [LowonganController::class, 'index']);