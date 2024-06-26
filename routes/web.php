<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ColaboradorController;
use App\Http\Controllers\ContratoColaboradorController;
use App\Http\Controllers\HorarioController;
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
    Route::resource('horarios', HorarioController::class);
});