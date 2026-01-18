<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\ServiciosController;
use App\Http\Controllers\MascotaController;
use App\Http\Controllers\CitaController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ArticulosController;
use App\Http\Controllers\Dashboard;

Route::get('/', function () {
    return Response::file(public_path('index.html'));
});

// O si es un archivo PHP dentro de resources/views
Route::get('/', function () {
    return view('index');
});

Route::get('citas', function () {
    return view('citas.citasusuario'); // Asume que está en resources/views/citas/citasusuario.blade.php
})->middleware(['auth', 'verified'])->name('citas');

Route::get('/dashboard', [Dashboard::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/agregar_servicio', [ServiciosController::class, 'index'])->name('agregar.servicio');
Route::post('/servicios', [ServiciosController::class, 'store'])->name('servicios.store');

Route::get('/agregar_mascota', [MascotaController::class, 'index'])->name('agregar.mascota');
Route::post('/mascotas', [MascotaController::class, 'store'])->name('mascotas.store');
Route::get('/citas_usuario', [CitaController::class, 'index'])->name('citas.usuario');
Route::post('/citas_crear', [CitaController::class, 'store'])->name('citas.store');
Route::get('/consultar_citas', [CitaController::class, 'consultaCitas'])->name('citas.consulta');

Route::get('/agregar_categoria', [CategoriaController::class, 'index'])->name('agregar.categoria');
Route::post('/categorias', [CategoriaController::class, 'store'])->name('categorias.store');

Route::get('/agregar_producto', [ArticulosController::class, 'index'])->name('agregar.producto');
Route::post('/articulos', [ArticulosController::class, 'store'])->name('articulos.store');


require __DIR__.'/auth.php';