<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\M_trans;
use App\Models\M_buku;
use App\Models\M_user;

class C_trans extends Controller
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
            'title' => 'Data Transaksi',
            'trans' => $this->M_trans->allData(),
    	];

    	return view('trans.v_tampil', $data);
    }

    public function detail($id){
        if (!session()->get('email')){
            return redirect()->route('login')->with('pesan', 'kamu belum login');
        }

        if (!$this->M_trans->detailData($id)) {
            abort(404);
        }
        $data = [
            'title' => 'Detail Data Transaksi',
            'trans' => $this->M_trans->detailData($id),
        ];
        return view('trans.v_detail', $data);
    }

    public function tambah(){
        if (!session()->get('email')){
            return redirect()->route('login')->with('pesan', 'kamu belum login');
        }

        $data = [
            'title' => 'Tambah Data Transaksi',
            'user' => $this->M_user->allData(),
            'buku' => $this->M_buku->allData(),
        ];
        return view('trans.v_tambah', $data);
    }

    public function sunting($id){
        if (!session()->get('email')){
            return redirect()->route('login')->with('pesan', 'kamu belum login');
        }

        if(session()->get('level')==2){
            return back();
        }

        $data = [
            'title' => 'Sunting Data Transaksi',
            'trans' => $this->M_trans->detailData($id),
            'user' => $this->M_user->allData(),
            'buku' => $this->M_buku->allData(),
        ];
        return view('trans.v_sunting', $data);
    }

    public function form_val($id = null){
        if (!session()->get('email')){
            return redirect()->route('login')->with('pesan', 'kamu belum login');
        } 

        Request()->validate([
            'waktu_pinjam' => 'required',
            'user' => 'required',
            'buku' => 'required',
        ],[
            'required' => 'Wajib diisi'
        ]);

        $detail = $this->M_trans->detailData($id);

        if(isset(Request()->ganstat)){
            if(Request()->ganstat==1){
                //kalo tombol "konfirmasi pengambilan buku" diklik, status belum diambil berubah jadi belum dikembalikan
                $data = [
                    'waktu_pinjam' => Request()->waktu_pinjam,
                    'id_user' => Request()->user,
                    'id_buku' => Request()->buku,
                    'id_status' => 1,
                    'waktu_ambil' => date("Y-m-d"),
                ];
                $buku_sedia = ['sedia'=> 2];
            }
            else if(Request()->ganstat==2){
                //kalo tombol "konfirmasi pengembalian buku" diklik, status belum dikembalikan berubah jadi sudah dikembalikan, tapi ada kondisinya. Kalo tombol diklik setelah 7 hari dari status "belum dikembalikan", statusnya jadi "sudah dikembalikan, terlambat", dan kalo sebelum 7 hari maka "sudah dikembalikan"
                if (date("Y-m-d", strtotime("-7 days")) > $detail->waktu_ambil){
                    $status = 3;
                }else{
                    $status = 2;
                }
                
                $data = [
                    'waktu_pinjam' => Request()->waktu_pinjam,
                    'id_user' => Request()->user,
                    'id_buku' => Request()->buku,
                    'waktu_kembali' => date("Y-m-d"),
                    'id_status' => $status,
                ];
                $buku_sedia = ['sedia'=> 1];
            }
           
        }else{
            $data = [
                'waktu_pinjam' => Request()->waktu_pinjam,
                'id_user' => Request()->user,
                'id_buku' => Request()->buku,
            ];
            $buku_sedia = ['sedia'=> 1];
        }

        if(isset($id)){
            $this->M_trans->suntingData($id,$data);
            $this->M_buku->suntingData(Request()->buku,$buku_sedia);
            $pesan = 'Data berhasil disunting';
        }
        else{
            $this->M_trans->tambahData($data);
            $this->M_buku->suntingData(Request()->buku,$buku_sedia);
            $pesan = 'Data berhasil ditambahkan';         
        }

        return redirect()->route('trans')->with('pesan', $pesan);
    }

    public function hapus($id){
        if (!session()->get('email')){
            return redirect()->route('login')->with('pesan', 'kamu belum login');
        }
    	
        if(session()->get('level')==2){
            return back();
        }

        $this->M_trans->hapusData($id);
        $pesan = 'Data berhasil dihapus';
        return redirect()->route('trans')->with('pesan', $pesan);
    }
}
