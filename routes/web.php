<?php

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

Route::get('/', function () {
    return view('v_home');
});

Route::view('/about','v_about', [
	'nama'=> 'Septi',
	'kelas'=>'Laravel'
]);

Route::get('/welcome', function () {
    return view('welcome');
});


Route::get('/buku', function () {
    return view('buku.v_tampil');
});

Route::get('/buku/tambah', function () {
    return view('buku.v_tambah');
});

Route::get('/buku/sunting', function () {
    return view('buku.v_sunting');
});

Route::get('/buku/detail', function () {
    return view('buku.v_detail');
});


Route::get('/pengguna', function () {
    return view('pengguna.v_tampil');
});

Route::get('/pengguna/tambah', function () {
    return view('pengguna.v_tambah');
});

Route::get('/pengguna/sunting', function () {
    return view('pengguna.v_sunting');
});

Route::get('/pengguna/detail', function () {
    return view('pengguna.v_detail');
});


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