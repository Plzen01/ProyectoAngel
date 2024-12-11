<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProyectoController;
use App\Http\Controllers\ArchivoController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('proyectos', [ProyectoController::class, 'index'])->name('profesor.index');
Route::get('proyectos/create', [ProyectoController::class, 'create'])->name('profesor.create');
Route::post('proyectos', [ProyectoController::class, 'store'])->name('profesor.store');
Route::get('proyectos/{id}', [ProyectoController::class, 'show'])->name('profesor.show');
Route::get('proyectos/{id}/edit', [ProyectoController::class, 'edit'])->name('profesor.edit');
Route::patch('proyectos/{id}', [ProyectoController::class, 'update'])->name('profesor.update');
Route::delete('proyectos/{id}', [ProyectoController::class, 'destroy'])->name('profesor.delete');


//Rutas para archivos
Route::get('archivos', [ArchivoController::class, 'index'])->name('estudiante.index');
Route::get('/proyecto/{id}/archivos', [ArchivoController::class, 'index'])->name('archivos.index');
Route::post('/proyecto/{id}/archivos', [ArchivoController::class, 'store'])->name('archivos.store');
Route::get('/archivo/{id}/descargar', [ArchivoController::class, 'download'])->name('archivos.download');
