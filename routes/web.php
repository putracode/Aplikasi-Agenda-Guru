<?php

use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;

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
//     return view('login');
// })->middleware('guest');


Route::get('/',[LoginController::class,'index'])->name('login');

Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard')->middleware('auth');

Route::get('/guru',[GuruController::class,'index'])->name('guru')->middleware('admin');
Route::post('/tambahguru',[GuruController::class,'insert']);
Route::get('/deleteguru/{id}',[GuruController::class,'destroy'])->middleware('admin');
Route::get('/editguru/{id}',[GuruController::class,'edit'])->middleware('admin');
Route::post('/updateguru/{id}',[GuruController::class,'update']);

Route::get('/kelas',[KelasController::class,'index'])->name('kelas')->middleware('admin');
Route::post('/tambahkelas',[KelasController::class,'insert']);
Route::get('/deletekelas/{id}',[KelasController::class,'destroy'])->middleware('admin');
Route::get('/editkelas/{id}',[KelasController::class,'edit']);
Route::post('/updatekelas/{id}',[KelasController::class,'update']);

Route::get('/agenda',[AgendaController::class,'index'])->name('agenda')->middleware('auth');
Route::post('/tambahagenda',[AgendaController::class,'insert']);
Route::get('/deleteagenda/{id}',[AgendaController::class,'destroy'])->middleware('auth');
Route::get('/editagenda/{id}',[AgendaController::class,'edit'])->middleware('auth');
Route::post('/updateagenda/{id}',[AgendaController::class,'update']);

Route::get('/login',[LoginController::class,'index'])->middleware('guest');
Route::post('/login',[LoginController::class,'authenticate']);

Route::post('/logout',[LoginController::class,'logout']);

Route::get('/register',[RegisterController::class,'index'])->middleware('guest');
