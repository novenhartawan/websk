<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MKController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index']);

Route::controller(MahasiswaController::class)->prefix("mahasiswa")->group(function () {
    Route::get('/', 'index');
    Route::post('/', 'store');
    Route::get('/create', 'create');
    Route::get('/{mhs}', 'show');
    Route::put('/{mhs}', 'update');
    Route::delete('/{mhs}', 'destroy');
    Route::get('/{mhs}/edit', 'edit');
});

Route::controller(MKController::class)->prefix("mk")->group(function () {
    Route::get('/', 'index');
    Route::get('/create', 'create');
    Route::get('/{id}', 'show');
    Route::get('/{id}/edit', 'edit');
});

Route::controller(KelasController::class)->prefix("kelas")->group(function () {
    Route::get('/', 'index');
    Route::get('/create', 'create');
    Route::get('/{id}', 'show');
    Route::get('/{id}/edit', 'edit');
});
