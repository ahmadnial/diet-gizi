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

// Route::get('/', function () {
//     return view('welcome'); 
// });
Route::get('/', [HomeController::class, 'index']);
Route::get('/getDiet', [HomeController::class, 'getLabel']);

Route::get('/dashboard', [HomeController::class, 'dash']);

Route::post('/insert-diet', [ProsesController::class, 'addDiet']);
