<?php

use Illuminate\Support\Facades\Route;

// Página principal
Route::get('/edudata', function () {
    return view('edudata.index');
})->name('edudata.index');

// Secciones de información
Route::prefix('edudata')->group(function () {
    // Presupuesto
    Route::get('/presupuesto', function () {
        return view('edudata.presupuesto.index');
    })->name('edudata.presupuesto');
    
    // Fondos a escuelas
    Route::get('/fondos-escuelas', function () {
        return view('edudata.fondos.index');
    })->name('edudata.fondos');
    
    // Inventario de bienes
    Route::get('/inventario-bienes', function () {
        return view('edudata.inventario.index');
    })->name('edudata.inventario');
    
    // Transporte escolar
    Route::get('/transporte-escolar', function () {
        return view('edudata.transporte.index');
    })->name('edudata.transporte');
    
    // Subsidios
    Route::get('/subsidios', function () {
        return view('edudata.subsidios.index');
    })->name('edudata.subsidios');
});
