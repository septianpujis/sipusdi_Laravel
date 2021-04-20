<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\C_buku;
use App\Http\Controllers\C_user;
use App\Http\Controllers\C_transaksi;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'index']);

Route::get('/about/{id}', [HomeController::class, 'about']);

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


Route::get('/transaksi', function () {
    return view('transaksi.v_tampil');
});

Route::get('/transaksi/tambah', function () {
    return view('transaksi.v_tambah');
});

Route::get('/transaksi/sunting', function () {
    return view('transaksi.v_sunting');
});

Route::get('/transaksi/detail', function () {
    return view('transaksi.v_detail');
});