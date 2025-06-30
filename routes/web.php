<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PrespuestoEduGralController;
use App\Http\Controllers\EduRedController;
use App\Http\Controllers\AuthController;

// Página principal
Route::get('/', function () {
    return view('edudata.index');
})->name('edudata.index');

// Secciones de EduData
Route::prefix('edudata')->group(function () {
    Route::get('/presupuesto', [PrespuestoEduGralController::class, 'index'])->name('edudata.presupuesto');
    Route::get('/fondos-escuelas', fn() => view('edudata.fondos.index'))->name('edudata.fondos');
    Route::get('/inventario-bienes', fn() => view('edudata.inventario.index'))->name('edudata.inventario');
    Route::get('/transporte-escolar', fn() => view('edudata.transporte.index'))->name('edudata.transporte');
    Route::get('/subsidios', fn() => view('edudata.subsidios.index'))->name('edudata.subsidios');
});

// Autenticación manual
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Secciones de EduRed con autenticación obligatoria
Route::prefix('edured')->middleware('auth')->group(function () {
    Route::get('/', [EduRedController::class, 'index'])->name('edured.index');
    Route::get('/requerimientos', [EduRedController::class, 'requerimientos'])->name('edured.requerimientos');
});