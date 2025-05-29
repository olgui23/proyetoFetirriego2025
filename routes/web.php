<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

use App\Http\Controllers\AdminController;

Route::get('/', [AdminController::class, 'index'])->name('dashboard');
Route::get('/dashboard', [AdminController::class, 'index']);

use App\Http\Controllers\CultivoController;
use App\Http\Controllers\SensorController;
use App\Http\Controllers\RiegoController;
use App\Http\Controllers\ConfiguracionController;
use App\Http\Controllers\ReporteController;
use App\Http\Controllers\UsuarioController;

// Ruta principal
Route::get('/', [AdminController::class, 'index'])->name('dashboard');

// Cultivos
Route::get('/cultivos', [CultivoController::class, 'index'])->name('cultivos');

// Sensores
Route::get('/sensores', [SensorController::class, 'index'])->name('sensores');

// Riego
Route::get('/riego', [RiegoController::class, 'index'])->name('riego');

// Configuración
Route::get('/configuracion', [ConfiguracionController::class, 'index'])->name('configuracion');

// Reportes
Route::get('/reportes', [ReporteController::class, 'index'])->name('reportes');

// Usuarios
Route::get('/usuarios', [UsuarioController::class, 'index'])->name('usuarios');


