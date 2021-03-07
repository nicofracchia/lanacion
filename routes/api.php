<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NavesController;
use App\Http\Controllers\VehiculosController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// NAVES

Route::get('/naves', [NavesController::class, 'index']);

Route::get('/naves/inventario', [NavesController::class, 'getInventario']);

Route::post('/naves/inventario/new', [NavesController::class, 'new']);

Route::patch('/naves/inventario/increment', [NavesController::class, 'increment']);

Route::patch('/naves/inventario/decrement', [NavesController::class, 'decrement']);

Route::patch('/naves/inventario/modify', [NavesController::class, 'modify']);

Route::get('/naves/{id}', [NavesController::class, 'getDetallesById'])->where(['id' => '[0-9]+']);

Route::get('/naves/inventario/{busqueda}', [NavesController::class, 'findByKeyword']);

// VEHICULOS

Route::get('/vehiculos', [VehiculosController::class, 'index']);

Route::get('/vehiculos/inventario', [VehiculosController::class, 'getInventario']);

Route::post('/vehiculos/inventario/new', [VehiculosController::class, 'new']);

Route::patch('/vehiculos/inventario/increment', [VehiculosController::class, 'increment']);

Route::patch('/vehiculos/inventario/decrement', [VehiculosController::class, 'decrement']);

Route::patch('/vehiculos/inventario/modify', [VehiculosController::class, 'modify']);

Route::get('/vehiculos/{id}', [VehiculosController::class, 'getDetallesById'])->where(['id' => '[0-9]+']);

Route::get('/vehiculos/inventario/{busqueda}', [VehiculosController::class, 'findByKeyword']);
