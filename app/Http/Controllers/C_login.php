<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\M_user;

class C_login extends Controller
{
    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
        $this->M_user = new M_user();
    }

    public function authenticate()
    {
        $dataLogin = $this->M_user->loginData(Request()->email,Request()->password);
        // $credentials = Request()->only('email', 'password');

        if ($dataLogin) {
            Request()->session()->regenerate();
            Request()->session()->put('email', $dataLogin->email);
            Request()->session()->put('nama', $dataLogin->nama);
            Request()->session()->put('id', $dataLogin->id_user);
            Request()->session()->put('nomor', $dataLogin->nomor_induk);
            Request()->session()->put('level', $dataLogin->level);

            return redirect()->route('home')->with('pesan', 'Selamat Datang');
        }

        return back()->with('pesan', 'Gagal Masuk, periksa email dan password');
    }

    public function index()
    {
        if (session()->has('email')) {
            return back()->with('pesan', 'Anda sudah Login');
        }else{
            return view('v_login');            
        }

    }

    public function logout()
    {
        Request()->session()->forget('email');
        Request()->session()->forget('nama');
        Request()->session()->forget('id');
        Request()->session()->forget('nomor');
        Request()->session()->forget('level');

        return redirect()->route('login');
    }
}