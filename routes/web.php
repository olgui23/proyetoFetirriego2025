<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CultivoController;
use App\Http\Controllers\SensorController;
use App\Http\Controllers\RiegoController;
use App\Http\Controllers\ConfiguracionController;
use App\Http\Controllers\ReporteController;
use App\Http\Controllers\UsuarioController;
// Nuevos Controladores
use App\Http\Controllers\MiCultivoController;
use App\Http\Controllers\GuiaController;
use App\Http\Controllers\AsistenteController;
use App\Http\Controllers\ControlCultivoController;

// Rutas públicas (sin autenticación)
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

// Rutas protegidas (requieren autenticación)
Route::middleware('auth')->group(function () {
    // Cerrar sesión
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    
    // Dashboard
    Route::redirect('/', '/dashboard'); // Redirige la raíz al dashboard
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
    
    // Todas tus otras rutas protegidas...
   
    // Rutas de Mi Cultivo
    Route::prefix('mi-cultivo')->group(function () {
    Route::get('/reportes', [MiCultivoController::class, 'reportes'])->name('miCultivo.reportes');
    Route::get('/calendario', [MiCultivoController::class, 'calendario'])->name('miCultivo.calendario');
    });

    // Rutas para Tu Guia
    Route::prefix('guia')->group(function () {
    Route::get('/variedades', [GuiaController::class, 'variedades'])->name('guia.variedades');
    Route::get('/plagas', [GuiaController::class, 'plagas'])->name('guia.plagas');
    Route::get('/salud', [GuiaController::class, 'salud'])->name('guia.salud');
    Route::get('/practicas', [GuiaController::class, 'practicas'])->name('guia.practicas');
    });

    // Rutas para Asistente
    Route::get('/asistente', [AsistenteController::class, 'index'])->name('asistente');
    Route::post('/asistente', [AsistenteController::class, 'responder'])->name('asistente.responder');

    // Rutas para Control de Riego y sensores: 
    Route::get('/control', [ControlCultivoController::class, 'index'])->name('control.index');
    Route::post('/control/activar', [ControlCultivoController::class, 'activarRiego'])->name('control.activar');

    
    
    
    
    
    Route::get('/cultivos', [CultivoController::class, 'index'])->name('cultivos');
    Route::get('/sensores', [SensorController::class, 'index'])->name('sensores');
    Route::get('/riego', [RiegoController::class, 'index'])->name('riego');
    Route::get('/configuracion', [ConfiguracionController::class, 'index'])->name('configuracion');
    Route::get('/reportes', [ReporteController::class, 'index'])->name('reportes');
    Route::get('/usuarios', [UsuarioController::class, 'index'])->name('usuarios');
});

// Redirección para rutas no definidas (opcional)
Route::fallback(function () {
    return auth()->check() 
        ? redirect()->route('dashboard')
        : redirect()->route('login');
});