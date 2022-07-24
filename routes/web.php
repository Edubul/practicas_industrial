<?php

use App\Http\Controllers\BancoController;
use App\Http\Controllers\EncuestaController;
use App\Http\Controllers\PracticasController;
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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/crear-cita', [PracticasController::class, 'cita'])
        ->name('crear-cita');
});
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/panel', [PracticasController::class, 'index'])
        ->name('panel');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/banco-practicas', [BancoController::class, 'index'])
        ->name('banco-practicas');
});



Route::get('encuesta', [EncuestaController::class, 'index'])->name('encuesta');
Route::post('encuesta/create', [EncuestaController::class, 'create']);

Route::post('practica/create', [PracticasController::class, 'store']);
