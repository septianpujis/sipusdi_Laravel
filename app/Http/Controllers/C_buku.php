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
        if (!session()->get('email')){
            return redirect()->route('login')->with('pesan', 'kamu belum login');
        }

        if (isset($_GET['search'])){
            $data_buku = $this->M_buku->searchData($_GET['search']);
        }
        else{
            $data_buku = $this->M_buku->allData();
        }

    	$data = [
            'title' => 'Buku',
            'buku' => $data_buku,
    	];
    	return view('buku.v_tampil', $data);
    }

    public function tambah(){
        if (!session()->get('email')){
            return redirect()->route('login')->with('pesan', 'kamu belum login');
        }

        if(session()->get('level')==2){
            return back();
        }

        $data = [
        'title' => 'Tambah Buku',
        ];
        return view('buku.v_tambah', $data);
    }

    public function form_val($id = null){
        if (!session()->get('email')){
            return redirect()->route('login')->with('pesan', 'kamu belum login');
        }

        if(session()->get('level')==2){
            return back();
        }

        Request()->validate([
            'judul' => 'required|max:255',
            'penulis' => 'required|max:255',
            'penerbit' => 'required|max:255',
            'tahun' => 'required',
            'halaman' => 'required',
            'sampul' => 'mimes:jpg,jpeg,bmp,png|max:2048',

        ],[
            'required' => 'Wajib diisi',
            'max' => 'Maksimal 255 karakter',
            'sampul.mimes' => 'Gambar harus berformat jpg, jpeg, bmp, atau png.',
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
                'sedia' => Request()->sedia,
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
                'sedia' => Request()->sedia,
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
        if (!session()->get('email')){
            return redirect()->route('login')->with('pesan', 'kamu belum login');
        }

        if(session()->get('level')==2){
            return back();
        }

        $data = [
            'title' => 'Sunting Buku',
            'buku' => $this->M_buku->detailData($id)
        ];
        return view('buku.v_sunting', $data);
    }

    public function detail($id){
        if (!session()->get('email')){
            return redirect()->route('login')->with('pesan', 'kamu belum login');
        }

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
        if (!session()->get('email')){
            return redirect()->route('login')->with('pesan', 'kamu belum login');
        }

        if(session()->get('level')==2){
            return back();
        }

        $data =  $this->M_buku->detailData($id);
        if ($data->sampul <> ''){
            unlink(public_path('images').'/'.$data->sampul);
        }

        $this->M_buku->hapusData($id);
        $pesan = 'Data berhasil dihapus';
        return redirect()->route('buku')->with('pesan', $pesan);
    }
}