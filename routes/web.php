<?php

use App\Http\Controllers\CriteriaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/kriteria', [CriteriaController::class, 'index'])->name('kriteria.index');
Route::post('/kriteria', [CriteriaController::class, 'store'])->name('kriteria.store');
Route::put('/kriteria/{criteria}', [CriteriaController::class, 'update'])->name('kriteria.update');
Route::delete('/kriteria/{criteria}', [CriteriaController::class, 'destroy'])->name('kriteria.destroy');
