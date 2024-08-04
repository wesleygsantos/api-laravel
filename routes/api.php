<?php

use App\Http\Controllers\Api\CidadesController;
use App\Http\Controllers\Api\MarcaController;
use App\Http\Controllers\Api\ProdutoController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('login', [AuthController::class, 'login']);

Route::apiResource('/users', UserController::class);
// Route::middleware('api')->apiResource('/produtos', ProdutoController::class);
Route::apiResource('/produtos', ProdutoController::class);
Route::apiResource('/cidades', CidadesController::class);
Route::apiResource('/marcas', MarcaController::class);

Route::middleware('api')->get('/', function () {
    return response()->json([
        'success' => true
    ]);
});
