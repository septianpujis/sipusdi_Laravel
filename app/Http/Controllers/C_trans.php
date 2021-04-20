<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\M_trans;

class C_trans extends Controller
{
    public function __construct(){
        $this->M_trans = new M_trans();
    }

    public function index(){
    	$data = [
            'title' => 'Data Transaksi',
            'trans' => $this->M_trans->allData(),
    	];
    	return view('trans.v_tampil', $data);
    }

    public function tambah(){

        $data = [
        'title' => 'Tambah Data Transaksi',
        ];
        return view('trans.v_tambah', $data);
    }

    public function form_val($id = null){
        Request()->validate([
            'judul' => 'required|max:255',
            'penulis' => 'required|max:255',
            'penerbit' => 'required|max:255',
            'tahun' => 'required',
            'halaman' => 'required',
            'sampul' => 'mimes:jpg,jpeg,bmp,png|max:2048',

        ],[
            'judul.required' => 'Wajib diisi ::',
            'judul.max' => 'Maksimal 255 karakter ::',
            'penulis.required' => 'Wajib diisi ::',
            'penerbit.required' => 'Wajib diisi ::',
            'tahun.required' => 'Wajib diisi ::',
            'halaman.required' => 'Wajib diisi ::',
            'sampul.mimes' => 'Gambar harus berformat jpg, jpeg, bmp, atau png. ::',
            'sampul.max' => 'Ukuran maksimal 2mb',
        ]);

        if(Request()->sampul <> ''){
            $file = Request()->sampul;
            $filename = mt_rand(10000, 99999) . '.' . $file->extension();
            $file->move(public_path('images'), $filename);

            $data = [
                'judul' => Request()->judul,
                'penulis' => Request()->penulis,
                'penerbit' => Request()->penerbit,
                'tahun' => Request()->tahun,
                'halaman' => Request()->halaman,
                'genre' => Request()->genre,
                'sinopsis' => Request()->sinopsis,
                'sampul' => $filename,
            ];

            if(isset($id)){
                $this->M_trans->suntingData($id,$data);
                $pesan = 'Data berhasil disunting';
            }
            else{
                $this->M_trans->tambahData($data);
                $pesan = 'Data berhasil ditambahkan';         
            }
        }else{
            $data = [
                'judul' => Request()->judul,
                'penulis' => Request()->penulis,
                'penerbit' => Request()->penerbit,
                'tahun' => Request()->tahun,
                'halaman' => Request()->halaman,
                'genre' => Request()->genre,
                'sinopsis' => Request()->sinopsis,
            ];

            if(isset($id)){
                $this->M_trans->suntingData($id,$data);
                $pesan = 'Data berhasil disunting';
            }
            else{
                $this->M_trans->tambahData($data);
                $pesan = 'Data berhasil ditambahkan';         
            }
        }
        return redirect()->route('trans')->with('pesan', $pesan);
    }

    public function sunting($id){
        $data = [
            'title' => 'Sunting Data Transaksi',
            'trans' => $this->M_trans->detailData($id)
        ];
        return view('trans.v_sunting', $data);
    }

    public function detail($id){

        if (!$this->M_trans->detailData($id)) {
            abort(404);
        }
        $data = [
            'title' => 'Detail Data Transaksi',
            'trans' => $this->M_trans->detailData($id),
        ];
        return view('trans.v_detail', $data);
    }

    public function hapus($id){
    	
        $this->M_trans->hapusData($id);
        $pesan = 'Data berhasil dihapus';
        return redirect()->route('trans')->with('pesan', $pesan);
    }
}
