<?php

use App\Http\Controllers\PrestamosController;
use App\Http\Controllers\BancoController;
use App\Http\Controllers\CalendarioController;
use App\Http\Controllers\EncuestaController;
use App\Http\Controllers\EvidenciasController;
use App\Http\Controllers\ExternosController;
use App\Http\Controllers\PracticasController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InventarioController;
use App\Http\Controllers\PanelController;
use App\Models\Practica;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Auth/Login');
});

//Registro Externos
Route::get('/register/externos', [ExternosController::class, 'create'])->name('externos.create');
Route::post('/register/externos', [ExternosController::class, 'store'])->name('externos.store');

// Calendario
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/calendario', [CalendarioController::class, 'index'])
        ->name('calendario');
});
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/calendario/{id}', [CalendarioController::class, 'show'])
        ->name('calendario.show');
});
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::post('/calendario', [CalendarioController::class, 'store'])
        ->name('calendario');
});


// Evidencias Routes
Route::get('evidencia_alumno', [EvidenciasController::class, 'create'])->name('evidencia.create');
Route::post('evidencia/store', [EvidenciasController::class, 'store'])->name('evidencia.store');


// Practicas Routes
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/panel', [PanelController::class, 'index'])
        ->name('panel');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('practica/create', [PracticasController::class, 'create'])
        ->name('practica.create');
});

Route::post('practica/', [PracticasController::class, 'store']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('practicas/banco', [PracticasController::class, 'banco'])
        ->name('practicas.banco');
});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('practicas/{id}/edit', [PracticasController::class, 'edit'])
        ->name('practicas.edit');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::put('/practica/{id}', [PracticasController::class, 'update'])
        ->name('practicas.update');
});

// Dashboard
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard.index');
});

// Inventario
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
Route::get('/inventario', [InventarioController::class, 'index'])
    ->name('inventario.index');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
Route::get('/inventario/create', [InventarioController::class, 'create'])
    ->name('inventario.create');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
Route::get('/inventario/{art_id}/edit', [InventarioController::class, 'edit'])
    ->name('inventario.edit');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
Route::put('/inventario/{art_id}', [InventarioController::class, 'update'])
    ->name('inventario.update');
});


// Prestamos
Route::get('/prestamos',[PrestamosController::class, 'index'])
        ->name('prestamos.index');


Route::post('/prestamos',[PrestamosController::class, 'store'])
        ->name('prestamos.store');

// Practicas
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/practicas-pendientes', [PracticasController::class, 'index'])
        ->name('practicas.index');
});