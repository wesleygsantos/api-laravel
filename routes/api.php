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

Route::group([
    'prefix' => 'auth'
], function ($router) {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    // Route::post('/logout', [AuthController::class, 'logout']);
    // Route::post('/refresh', [AuthController::class, 'refresh']);
    // Route::get('/user-profile', [AuthController::class, 'userProfile']);
});

Route::apiResource('/produtos', ProdutoController::class)->middleware('auth:api');
Route::apiResource('/cidades', CidadesController::class)->middleware('auth:api');
Route::apiResource('/marcas', MarcaController::class)->middleware('auth:api');

Route::middleware('api')->get('/', function () {
    return response()->json([
        'success' => true
    ]);
});
