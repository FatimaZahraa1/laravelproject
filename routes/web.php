<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MeterReadingController;

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/login', fn() => view('login'))->name('login');
Route::get('/register', fn() => view('registration'))->name('register');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::get('/me', function () {
    return Auth::user();
});
Route::get('/test-db', function () {
    return DB::select('SHOW TABLES');
});
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');
Route::get('/dashboard', [MeterReadingController::class, 'index'])->name('dashboard');
Route::post('/meter-readings', [MeterReadingController::class, 'store'])->name('meter-readings.store');
Route::get('/meter-readings', [MeterReadingController::class, 'table'])->name('meter-readings.table');
Route::get('/meter-readings/{id}/edit', [MeterReadingController::class, 'edit'])->name('meter-readings.edit');
Route::delete('/meter-readings/{id}', [MeterReadingController::class, 'destroy'])->name('meter-readings.destroy');
