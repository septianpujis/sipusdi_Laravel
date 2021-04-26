<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\M_user;
use App\Models\M_trans;

class C_user extends Controller
{
    public function __construct(){
        $this->M_user = new M_user();
        $this->M_trans = new M_trans();
    }

    public function index(){
        if (!session()->get('email')){
            return redirect()->route('login')->with('pesan', 'kamu belum login');
        }

        if (session()->get('level')==2){
            return redirect('/user/detail/'.session()->get('id'));
        }
        
        if (isset($_GET['search'])){
            $user = $this->M_user->searchData($_GET['search']);
        }
        else{
            $user = $this->M_user->allData();
        }


    	$data = [
            'title' => 'User',
            'user' => $user,
    	];
    	return view('user.v_tampil', $data);
    }

    public function tambah(){
        if (!session()->get('email')){
            return redirect()->route('login')->with('pesan', 'kamu belum login');
        }
        
        if(session()->get('level')==2){
            return back();
        }

        $data = [
            'title' => 'Tambah User',
            'kelas' => $this->M_user->allKelas(),
        ];
        return view('user.v_tambah', $data);
    }

    public function sunting($id){
        if (!session()->get('email')){
            return redirect()->route('login')->with('pesan', 'kamu belum login');
        }
        
        if(!(session()->get('id')==$id)){
            return back();
        }
        
        if (!$this->M_user->detailData($id)) {
            abort(404);
        }

        $data = [
            'title' => 'Sunting User',
            'user' => $this->M_user->detailData($id),
            'kelas' => $this->M_user->allKelas(),
        ];
        return view('user.v_sunting', $data);
    }

    public function form_val($id = null){
        if (!session()->get('email')){
            return redirect()->route('login')->with('pesan', 'kamu belum login');
        }
        
        if(session()->get('level')==2){
            return back();
        }

        Request()->validate([
            'nomor' => 'required|max:255',
            'nama' => 'required|max:255',
            'level' => 'required|max:255',
            'id_kelas' => 'required',
            'no_telp' => 'required',
            'email' => 'required',
            'password' => 'required',
            'foto_profil' => 'mimes:jpg,jpeg,bmp,png|max:2048',

        ],[
            'required' => 'Wajib diisi ::',
            'max' => 'Maksimal 255 karakter ::',
            'foto_profil.mimes' => 'Gambar harus berformat jpg, jpeg, bmp, atau png. ::',
            'foto_profil.max' => 'Ukuran maksimal 2mb',
        ]);

        if(Request()->foto_profil <> ''){
            $file = Request()->foto_profil;
            $filename = mt_rand(10000, 99999) . '.' . $file->extension();
            $file->move(public_path('images'), $filename);

            $data = [
                'nomor_induk' => Request()->nomor,
                'nama' => Request()->nama,
                'level' => Request()->level,
                'id_kelas' => Request()->id_kelas,
                'no_telp' => Request()->no_telp,
                'email' => Request()->email,
                'password' => Request()->password,
                'foto' => $filename,
            ];

            if(isset($id)){
                $this->M_user->suntingData($id,$data);
                $pesan = 'Data berhasil disunting';
            }
            else{
                $this->M_user->tambahData($data);
                $pesan = 'Data berhasil ditambahkan';         
            }
        }else{
            $data = [
                'nomor_induk' => Request()->nomor,
                'nama' => Request()->nama,
                'level' => Request()->level,
                'id_kelas' => Request()->id_kelas,
                'no_telp' => Request()->no_telp,
                'email' => Request()->email,
                'password' => Request()->password,
            ];

            if(isset($id)){
                $this->M_user->suntingData($id,$data);
                $pesan = 'Data berhasil disunting';
            }
            else{
                $this->M_user->tambahData($data);
                $pesan = 'Data berhasil ditambahkan';         
            }
        }
        return redirect()->route('user')->with('pesan', $pesan);
    }


    public function detail($id){
        if (!session()->get('email')){
            return redirect()->route('login')->with('pesan', 'kamu belum login');
        }
        

        if (!$this->M_user->detailData($id)) {
            abort(404);
        }

        $data = [
            'title' => 'Detail User',
            'user' => $this->M_user->detailData($id),
            'trans' => $this->M_trans->perUserData($id),
        ];
        return view('user.v_detail', $data);
    }

    public function hapus($id){
        if (!session()->get('email')){
            return redirect()->route('login')->with('pesan', 'kamu belum login');
        }
        
        if(session()->get('level')==2){
            return back();
        }

        $data =  $this->M_user->detailData($id);
        if ($data->foto <> ''){
            unlink(public_path('images').'/'.$data->foto);
        }

        $this->M_user->hapusData($id);
        $pesan = 'Data berhasil dihapus';
        return redirect()->route('user')->with('pesan', $pesan);
    }
}
