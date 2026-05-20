<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SkinRecommendationController;

Route::post('/hitung-rekomendasi', [SkinRecommendationController::class, 'hitungRekomendasi']);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
