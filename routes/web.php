<?php

use App\Http\Controllers\AntrianAdminController;
use App\Http\Controllers\AntrianController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HonorController;
use App\Http\Controllers\JenisController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\ServisController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('apps.dashboard');
// });

//route login
Route::get('/', [AntrianController::class, 'antrian'])->name('antrian');
Route::post('/', [AntrianController::class, 'post'])->name('postAntrian');
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/authh', [UserController::class, 'authenticate'])->name('loginPost');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

Route::group(['middleware' => ['auth']], function () {

    Route::group(['middleware' => ['admin:1']], function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource('users', UsersController::class);
        Route::resource('jenis', JenisController::class);
        Route::resource('antrian', AntrianAdminController::class);
        Route::resource('barang', BarangController::class);
        Route::resource('servis', ServisController::class);
        Route::resource('penjualan', PenjualanController::class);
        Route::resource('honor', HonorController::class);


            
    });
});
