<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\C_buku;
use App\Http\Controllers\C_user;
use App\Http\Controllers\C_trans;
use App\Http\Controllers\C_login;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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
//     return view('v_home');
// });

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/about/{id}', [HomeController::class, 'about'])->middleware('auth');

Route::get('/welcome', function () {
    return view('welcome');
});


Route::get('/buku', [C_buku::class, 'index'])->name('buku');

Route::get('/buku/tambah', [C_buku::class, 'tambah']);

Route::post('/buku/form_val/{id?}', [C_buku::class, 'form_val']);

Route::get('/buku/sunting/{id}', [C_buku::class, 'sunting']);

Route::get('/buku/detail/{id}', [C_buku::class, 'detail']);

Route::get('/buku/hapus/{id}', [C_buku::class, 'hapus']);


Route::get('/user', [C_user::class, 'index'])->name('user');

Route::get('/user/tambah', [C_user::class, 'tambah']);

Route::post('/user/form_val/{id?}', [C_user::class, 'form_val']);

Route::get('/user/sunting/{id}', [C_user::class, 'sunting']);

Route::get('/user/detail/{id}', [C_user::class, 'detail']);

Route::get('/user/hapus/{id}', [C_user::class, 'hapus']);


Route::get('/trans', [C_trans::class, 'index'])->name('trans');

Route::get('/trans/tambah', [C_trans::class, 'tambah']);

Route::post('/trans/form_val/{id?}', [C_trans::class, 'form_val']);

Route::get('/trans/sunting/{id}', [C_trans::class, 'sunting']);

Route::get('/trans/detail/{id}', [C_trans::class, 'detail']);

Route::get('/trans/hapus/{id}', [C_trans::class, 'hapus']);


Route::get('/login', [C_login::class, 'index'])->name('login');

Route::post('/authenticate', [C_login::class, 'authenticate']);

Route::get('/logout', [C_login::class, 'logout'])->name('logout');