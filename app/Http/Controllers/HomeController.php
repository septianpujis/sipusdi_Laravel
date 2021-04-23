<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\M_trans;
use App\Models\M_buku;
use App\Models\M_user;

class HomeController extends Controller
{
    public function __construct(){
        $this->M_trans = new M_trans();
        $this->M_buku = new M_buku();
        $this->M_user = new M_user();
    }
    public function index(){
    	if (!session()->get('email')){
            return redirect()->route('login')->with('pesan', 'kamu belum login');
        }

        $data = [
            'user' => $this->M_user->allData()->count(),
            'buku' => $this->M_buku->allData()->count(),
            'trans' => $this->M_trans->allData()->count(),
    		'nama' => 'Septi'
    	];
    	return view('v_home', $data);
    }

    public function about($id){
    	if (!session()->get('email')){
            return redirect()->route('login')->with('pesan', 'kamu belum login');
        }

        $data = [ 
            'link'=> $id 
        ];
    	return view('v_about',$data);
    }
}
