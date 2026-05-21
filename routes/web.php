<?php

use App\Http\Controllers\Admin\AuthenticatedSessionController;
use App\Http\Controllers\Admin\PasswordController;
use App\Http\Controllers\CriteriaController;
use App\Http\Controllers\WelcomeInputController;
use App\Models\Criteria;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome', [
        'criterias' => Criteria::orderBy('id')->get(['id', 'name']),
        'savedWelcomeInputs' => session('welcome_inputs', ['alternatives' => []]),
    ]);
});

Route::middleware('guest')->group(function (): void {
    Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('login.store');
});

Route::middleware(['auth', 'admin'])->group(function (): void {
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

    Route::get('/admin/password', [PasswordController::class, 'edit'])->name('admin.password.edit');
    Route::put('/admin/password', [PasswordController::class, 'update'])->name('admin.password.update');

    Route::get('/kriteria', [CriteriaController::class, 'index'])->name('kriteria.index');
    Route::post('/kriteria', [CriteriaController::class, 'store'])->name('kriteria.store');
    Route::post('/kriteria/reset', [CriteriaController::class, 'reset'])->name('kriteria.reset');
    Route::put('/kriteria/{criteria}', [CriteriaController::class, 'update'])->name('kriteria.update');
    Route::delete('/kriteria/{criteria}', [CriteriaController::class, 'destroy'])->name('kriteria.destroy');
});

Route::post('/skin-inputs', [WelcomeInputController::class, 'store'])->name('welcome-inputs.store');
Route::delete('/skin-inputs', [WelcomeInputController::class, 'destroy'])->name('welcome-inputs.destroy');
