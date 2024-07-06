<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ColaboradorController;
use App\Http\Controllers\ContratoColaboradorController;
use App\Http\Controllers\HorarioController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\CargoController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return view('welcome');
})->middleware('guest');

Auth::routes();

// Ruta para el dashboard del administrador
Route::get('/admin', function () {
    return view('admin.home');
})->name('admin.home')->middleware('role:1');

// Ruta para el dashboard del usuario
Route::get('/user', function () {
    return view('user.home');
})->middleware('role:2');

Route::middleware(['auth', 'role:1'])->group(function () {
    Route::resource('colaboradors', ColaboradorController::class);
    Route::resource('contratos', ContratoColaboradorController::class);
    Route::resource('areas', AreaController::class);
    Route::resource('cargos', CargoController::class);
    Route::resource('users', UserController::class);



    // Rutas para horarios
    Route::resource('horarios', HorarioController::class);

    // Ruta específica para mostrar detalles del horario
    Route::get('horarios/{codigo_hor}/{codigo_dho?}', [HorarioController::class, 'show'])->name('horarios.show');

    // Ruta específica para editar detalles del horario
    Route::get('horarios/{codigo_hor}/{codigo_dho?}/edit', [HorarioController::class, 'edit'])->name('horarios.edit');

    // Ruta específica para actualizar el horario
    Route::put('horarios/{codigo_hor}', [HorarioController::class, 'update'])->name('horarios.update');

    // Ruta específica para actualizar los detalles del horario
    Route::put('detalles/{codigo_dho}', [HorarioController::class, 'updateDetalle'])->name('detalles.update');

    Route::delete('/horarios/{codigo_hor}', [HorarioController::class, 'destroy'])->name('horarios.destroy');

    // Ruta específica para eliminar los detalles del horario
    Route::delete('horarios/detalle/{codigo_dho}', [HorarioController::class, 'destroyDetalle'])->name('horarios.destroyDetalle');
});
