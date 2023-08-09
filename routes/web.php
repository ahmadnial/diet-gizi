<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProsesController;

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

// User Perawat GET
Route::get('/', [HomeController::class, 'index']);
Route::get('/krisan', [HomeController::class, 'krisan']);
Route::get('/matahari', [HomeController::class, 'matahari']);
Route::get('/tulip', [HomeController::class, 'tulip']);
Route::get('/lili', [HomeController::class, 'lili']);
Route::get('/isolasi', [HomeController::class, 'isolasi']);
Route::get('/perinatal', [HomeController::class, 'perinatal']);
Route::get('/getDiet', [HomeController::class, 'getLabel']);
// End User Perawat

// User Perawat POST & PUT
Route::post('/addDiet', [ProsesController::class, 'addDiet'])->name('plus');
Route::put('/viewedit/{PasienID}', [ProsesController::class, 'update'])->name('viewedit');
// End User Perawat POST & PUT

//Admin Gizi
Route::get('/dashboard', [HomeController::class, 'dash']);
Route::get('/cetakPagi/{id}', [HomeController::class, 'cetakPagi']);
Route::get('/cetakSiang/{id}', [HomeController::class, 'cetakSiang']);
Route::get('/cetakSore/{id}', [HomeController::class, 'cetakSore']);
Route::post('/isPulang/{PasienID}', [ProsesController::class, 'pulang']);
//End Amdin Gizi
