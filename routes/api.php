<?php

use App\Http\Controllers\API\ApiAntrianController;
use App\Http\Controllers\API\ApiHonorController;
use App\Http\Controllers\API\ApiPekerjaanController;
use App\Http\Controllers\API\ApiPenjualanController;
use App\Http\Controllers\API\ApiServisController;
use App\Http\Controllers\API\ApiUserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', [ApiUserController::class, 'login']);
Route::post('/pembelian', [ApiPenjualanController::class, 'pembelian']);
Route::post('/add-pekerjaan', [ApiPekerjaanController::class, 'addPekerjaan']);
Route::post('/add-honor', [ApiHonorController::class, 'postHonor']);

Route::get('/put-to-selesai/{id}', [ApiPekerjaanController::class, 'putSelesai']);


Route::get('/get-antrian', [ApiAntrianController::class, 'getAntrian']);
Route::get('/get-antrian-kerja', [ApiAntrianController::class, 'getAntrianKerja']);
Route::get('/get-jenis', [ApiServisController::class, 'getJenisServis']);
Route::get('/get-servis', [ApiServisController::class, 'getServisAll']);
Route::get('/get-honor/{id}', [ApiHonorController::class, 'getHonor']);
Route::get('/get-pekerjaan/{id}', [ApiPekerjaanController::class, 'getPekerjaan']);
