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

Route::get('/naves', [NavesController::class, 'index']);

Route::get('/naves/inventario', [NavesController::class, 'getInventario']);

Route::post('/naves/inventario/new', [NavesController::class, 'new']);

Route::patch('/naves/inventario/increment', [NavesController::class, 'increment']);

Route::patch('/naves/inventario/decrement', [NavesController::class, 'decrement']);

Route::patch('/naves/inventario/modify', [NavesController::class, 'modify']);

Route::get('/naves/{id}', [NavesController::class, 'getDetallesById'])->where(['id' => '[0-9]+']);

Route::get('/naves/inventario/{busqueda}', [NavesController::class, 'findByKeyword']);
