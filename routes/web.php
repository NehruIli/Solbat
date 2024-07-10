<?php

use App\Http\Controllers\BantuanController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HalamanController;
use App\Http\Controllers\SpesialisasiController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\RatingController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AccountController;

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
// })->name('home');

Route::get('/login', [AccountController::class, 'login'])->name('login');
Route::get('/logout', [AccountController::class, 'logout'])->name('logout');
Route::post('/authenticate', [AccountController::class, 'authenticate'])->name('authenticate');
Route::get('/authenticate', [AccountController::class, 'authenticate'])->name('authenticate');

Route::get('/register', [AccountController::class, 'showRegister'])->name('showRegister');
Route::post('/register', [AccountController::class, 'register'])->name('register');
// Route::get('/register', function(){
//     return view('course');
// })->name('course');
// Route::post('/authenticate', [AccountController::class, 'authenticate'])->name('authenticate');

Route::get('/', [AccountController::class, 'welcome' ])->name('welcome');

Route::get('/about', [HalamanController::class, 'about' ]);

Route::get('/course', [HalamanController::class, 'course' ])->name('bantuan')->middleware('auth');

Route::get('/detail', [HalamanController::class, 'detail' ])->middleware('auth');

Route::get('/detail-bantuan', [HalamanControll::class, 'detail-bantuan'])->middleware('auth');

Route::get('/cekDetail/{id}', [HalamanController::class, 'cekDetail'])->name('cekDetail')->middleware('auth');

Route::get('/contact', [HalamanController::class, 'contact'])->middleware('auth');

Route::get('/make_course', [HalamanController::class, 'make_course'])->name('make_course')->middleware('auth');
Route::post('/make_course', [BantuanController::class, 'submit'])->name('submit');

Route::get('/make_penawaran/{id}', [HalamanController::class, 'make_penawaran'])->name('make_penawaran')->middleware('auth');
Route::post('/make_penawaran', [BantuanController::class, 'submit_penawaran'])->name('submit_penawaran');

Route::get('/profile', [HalamanController::Class, 'profile'])->name('profile')->middleware('auth');
Route::post('/profile/{id}', [AccountController::class, 'submit_profile'])->name('submit_profile');

Route::get('/agent', [HalamanController::class, 'agent'])->name('agent')->middleware('auth');

Route::get('/agent_detail/{id}', [HalamanController::class, 'agent_detail'])->name('agent_detail')->middleware('auth');

Route::resource('spesialisasi', SpesialisasiController::class )->middleware('auth');

Route::get('/make_spesialisasi', [HalamanController::class, 'make_spesialisasi'])->name('make_spesialisasi')->middleware('auth');
Route::post('/make_spesialisasi', [SpesialisasiController::class, 'submit_spesialisasi'])->name('submit_spesialisasi')->middleware('auth');

Route::get('/update_spesialisasi', [HalamanController::class, 'update_spesialisasi'])->name('update_spesialisasi')->middleware('auth');
Route::post('/update_spesialisasi', [HalamanController::class, 'update_spesialisasi'])->name('update_spesialisasi')->middleware('auth');

// Route::put('/spesialisasi/{id}', [SpesialisasiController::class, 'update'])->name('spesialisasi.update');

Route::delete('/spesialisasi/{id}', [SpesialisasiController::class, 'delete'])->name('spesialisasi.delete')->middleware('auth');

Route::get('/admin_dasboard', [HalamanController::class, 'admin_dasboard'])->name('admin_dasboard');

Route::get('/edit_spesialisasi', [HalamanController::class, 'edit_spesialisasi'])->name('edit_spesialisasi')->middleware('auth');

Route::post('/contact_admin', [ContactController::class, 'store'])->name('contact_admin')->middleware('auth');

Route::get('/history_bantuan/{id}', [BantuanController::class, 'history_bantuan'])->name('history_bantuan')->middleware('auth');
Route::get('/statusbarang', [statusbarangController::class, 'inprocess'])->name('inprocess')->middleware('auth');
Route::get('/statusbarang/cancel/{id}', [StatusBarangController::class, 'cancel'])->name('cancel')->middleware('auth');
Route::get('/statusbarang/diterima/{id}', [StatusBarangController::class, 'diterima'])->name('diterima')->middleware('auth');

Route::get('/approval', [StatusController::class, 'approval'])->name('approval');
Route::put('/approval/approved/{id}', [StatusController::class, 'approved'])->name('approved');
Route::put('/approval/reject/{id}', [StatusController::class, 'reject'])->name('reject');

Route::get('/riwayat', [HalamanController::class, 'riwayat'])->name('riwayat');
Route::get('/spesialisasi/filter', [SpesialisasiController::class, 'filter'])->name('spesialisasi.filter');

Route::post('/rate', [RatingController::class, 'store'])->name('ratings.store');

