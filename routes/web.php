<?php

use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminAgendaController;
use App\Http\Controllers\GuruAgendaController;

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

// Dashboard
Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard')->middleware('auth');


// Tabel Data Guru
Route::get('/guru',[GuruController::class,'index'])->name('guru')->middleware('admin');
Route::get('/formguru',[GuruController::class,'form'])->middleware('admin');
Route::post('/tambahguru',[GuruController::class,'insert']);
Route::get('/deleteguru/{id}',[GuruController::class,'destroy'])->middleware('admin');
Route::get('/editguru/{id}',[GuruController::class,'edit'])->middleware('admin');
Route::post('/updateguru/{id}',[GuruController::class,'update']);


// Tabel Data Kelas
Route::get('/kelas',[KelasController::class,'index'])->name('kelas')->middleware('admin');
Route::get('/formkelas',[KelasController::class,'form'])->middleware('admin');
Route::post('/tambahkelas',[KelasController::class,'insert']);
Route::get('/deletekelas/{id}',[KelasController::class,'destroy'])->middleware('admin');
Route::get('/editkelas/{id}',[KelasController::class,'edit']);
Route::post('/updatekelas/{id}',[KelasController::class,'update']);


// Tabel Data Agenda Admin
Route::get('/agendaadmin',[AdminAgendaController::class,'index'])->name('adminagenda')->middleware('admin');
Route::get('/formagendaadmin',[AdminAgendaController::class,'form'])->middleware('admin');
Route::post('/tambahagendaadmin',[AdminAgendaController::class,'insert']);
Route::get('/deleteagendaadmin/{id}',[AdminAgendaController::class,'destroy'])->middleware('admin');
Route::get('/editagendaadmin/{id}',[AdminAgendaController::class,'edit'])->middleware('admin');
Route::post('/updateagendaadmin/{id}',[AdminAgendaController::class,'update']);

// Tabel Data Agenda Guru
Route::get('/agendaguru',[GuruAgendaController::class,'index'])->name('guruagenda')->middleware('auth');
Route::get('/formagendaguru',[GuruAgendaController::class,'form'])->middleware('auth');
Route::post('/tambahagendaguru',[GuruAgendaController::class,'insert']);
Route::get('/deleteagendaguru/{id}',[GuruAgendaController::class,'destroy'])->middleware('auth');
Route::get('/editagendaguru/{id}',[GuruAgendaController::class,'edit'])->middleware('auth');
Route::post('/updateagendaguru/{id}',[GuruAgendaController::class,'update']);


// Tabel Data User
Route::get('/register',[RegisterController::class,'index'])->name('user')->middleware('admin');
Route::get('/formuser',[RegisterController::class,'form'])->middleware('admin');
Route::post('/tambahregister',[RegisterController::class,'insert']);
Route::get('/deleteregister/{id}',[RegisterController::class,'destroy'])->middleware('admin');
Route::get('/editregister/{id}',[RegisterController::class,'edit'])->middleware('admin');
Route::post('/updateregister/{id}',[RegisterController::class,'update']);


// Login & Logout
Route::get('/login',[LoginController::class,'index'])->middleware('guest');
Route::post('/login',[LoginController::class,'authenticate']);
Route::post('/logout',[LoginController::class,'logout']);

// ExportExcel
Route::get('/exportexcel',[DashboardController::class,'exportexcel'])->name('exportexcel');

Route::get('/sky', function () {
    return view('layout.master');
});

