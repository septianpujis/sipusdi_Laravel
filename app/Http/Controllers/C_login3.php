<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class C_login extends Controller
{
    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function authenticate()
    {
        //$credentials = $request->only('email', 'password');

        $email = Request()->email;
        $password = Request()->password;

        if (Auth::attempt(['password' => $password])) {
            $request->session()->regenerate();

            return redirect()->route('buku')->with('pesan', 'Selamat login');
        }

        return back()->with(
            'pesan', 'The provided credentials do not match our records.');
    }

    public function index()
    {
        return view('v_login');
    }
}