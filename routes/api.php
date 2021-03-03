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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/naves', [NavesController::class, 'index']); // ---> get all naves OK!

Route::get('/naves/inventario', [NavesController::class, 'getInventario']); // ---> get all naves en inventario (bd local) OK!

Route::post('/naves/inventario/new', [NavesController::class, 'new']); // ---> new [ID, UNIDADES] => [ID, CANT, NOM, MOD, FAB] OK!

Route::patch('/naves/inventario/increment', [NavesController::class, 'increment']); // ---> inc [ID, UNIDADES] => [ID, CANT, NOM, MOD, FAB, INC] OK!

Route::patch('/naves/inventario/decrement', [NavesController::class, 'decrement']); // ---> dec [ID, UNIDADES] => [ID, CANT, NOM, MOD, FAB, DEC] OK!

Route::patch('/naves/inventario/modify', [NavesController::class, 'modify']); // ---> dec [ID, UNIDADES] => [ID, CANT, NOM, MOD, FAB, ANT] OK!

Route::get('/naves/{id}', [NavesController::class, 'getDetallesById'])->where(['id' => '[0-9]+']); // ---> OK!

Route::get('/naves/{busqueda}', [NavesController::class, 'findByKeyword']);