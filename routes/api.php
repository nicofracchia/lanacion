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

Route::get('/naves', [NavesController::class, 'index']);

Route::patch('/naves/add/{id}/{cantidad}', [NavesController::class, 'add'])->where(['id' => '[0-9]+','cantidad' => '[0-9]+']);

Route::patch('/naves/add/{id}/{cantidad}', [NavesController::class, 'substract'])->where(['id' => '[0-9]+','cantidad' => '[0-9]+']);

Route::patch('/naves/add/{id}/{cantidad}', [NavesController::class, 'modify'])->where(['id' => '[0-9]+','cantidad' => '[0-9]+']);

Route::get('/naves/{id}', [NavesController::class, 'getDetallesById'])->where(['id' => '[0-9]+']);

Route::get('/naves/{busqueda}', [NavesController::class, 'findByKeyword']);

Route::post('/naves/new/{id}/{cantidad}', [NavesController::class, 'new']);