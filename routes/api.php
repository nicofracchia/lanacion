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

Route::post('/naves/new', [NavesController::class, 'new']);

Route::patch('/naves/add', [NavesController::class, 'add']);

Route::patch('/naves/substract', [NavesController::class, 'substract']);

Route::patch('/naves/modify', [NavesController::class, 'modify']);

Route::get('/naves/{id}', [NavesController::class, 'getDetallesById'])->where(['id' => '[0-9]+']);

Route::get('/naves/{busqueda}', [NavesController::class, 'findByKeyword']);