<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
    	$data = [
    		'nama' => 'Septi'
    	];
    	return view('v_home', $data);
    }

    public function about($id){
    	$data = [ 
            'link'=> $id 
        ];
    	return view('v_about',$data);
    }
}
