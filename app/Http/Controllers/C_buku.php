<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class C_buku extends Controller
{
    public function index(){
    	$data = [
            'title' => 'Buku',
    		'nama' => 'Septi'
    	];
    	return view('buku.v_tampil', $data);
    }

    public function tambah(){
    	$data = [
            'title' => 'Tambah Buku',
    		'nama' => 'Septi'
    	];
    	return view('buku.v_tambah', $data);
    }

    public function sunting($id){
        $data = [
            'title' => 'Sunting Buku',
            'nama' => $id
        ];
        return view('buku.v_sunting', $data);
    }

    public function detail($id){
        $data = [
            'title' => 'Detail Buku',
            'nama' => $id
        ];
        return view('buku.v_detail', $data);
    }

    public function hapus($id){
        $data = [
            'title' => 'Hapus Buku',
            'nama' => $id
        ];
        return "DATANYA ". $id . "DIHAPUS";
    }
}
