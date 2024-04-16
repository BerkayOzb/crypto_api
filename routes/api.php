<?php

use App\Http\Controllers\api\CoinApiController;
use App\Http\Controllers\api\CoinNetworkApiController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', [AuthController::class, 'login']);

Route::controller(CoinApiController::class)->group(function () {
    Route::get('/coinsAPI', 'index')->name('index');
    Route::post('/coinsAPI', 'upload')->name('upload');
    Route::put('/coinsAPI/edit/{id}', 'edit')->name('edit');
    Route::delete('/coinsAPI/edit/{id}', 'delete')->name('delete');
});

Route::apiResource('networks', CoinNetworkApiController::class);
