<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LpjController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;

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

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/kunjungi', [HomeController::class, 'kunjungi'])->name('kunjungi');
Route::get('/kunjungi/{kunjung}', [HomeController::class, 'download'])->name('download');

Route::middleware(['auth'])->group(function () {
    Route::resource('role', RoleController::class);
    Route::resource('lpj', LpjController::class);
});
