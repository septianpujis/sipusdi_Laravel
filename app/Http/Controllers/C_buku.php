<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\M_buku;

class C_buku extends Controller
{
    public function __construct(){
        $this->M_buku = new M_buku();
    }

    public function index(){
    	$data = [
            'title' => 'Buku',
            'buku' => $this->M_buku->allData(),
    	];
    	return view('buku.v_tampil', $data);
    }

    public function tambah(){

        $data = [
        'title' => 'Tambah Buku',
        ];
        return view('buku.v_tambah', $data);
    }

    public function form_val($id){
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
            $this->M_buku->suntingData($id,$data);
            $pesan = 'Data berhasil disunting';
        }
        else{
            $this->M_buku->tambahData($data);
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
            $this->M_buku->suntingData($id,$data);
            $pesan = 'Data berhasil disunting';
        }
        else{
            $this->M_buku->tambahData($data);
            $pesan = 'Data berhasil ditambahkan';         
        }
    }
        return redirect()->route('buku')->with('pesan', $pesan);
    }

    public function sunting($id){
        $data = [
            'title' => 'Sunting Buku',
            'buku' => $this->M_buku->detailData($id)
        ];
        return view('buku.v_sunting', $data);
    }

    public function detail($id){

        if (!$this->M_buku->detailData($id)) {
            abort(404);
        }
        $data = [
            'title' => 'Detail Buku',
            'buku' => $this->M_buku->detailData($id),
        ];
        return view('buku.v_detail', $data);
    }

    public function hapus($id){

        $data =  $this->M_buku->detailData($id);
        if ($data->sampul <> ''){
            unlink(public_path('images').'/'.$data->sampul);
        }

        $this->M_buku->hapusData($id);
        $pesan = 'Data berhasil dihapus';
        return redirect()->route('buku')->with('pesan', $pesan);
    }
}
