<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class M_trans extends Model
{
    const table = 'tr_transaksi';
    const primary = 'id_trans';

    public function allData()   
    {
        return DB::table(self::table)
               ->join('tb_user', 'tr_transaksi.id_user', '=','tb_user.id_user')
               ->join('tb_book', 'tr_transaksi.id_buku', '=','tb_book.id_buku')
               ->join('tb_status_transaksi', 'tr_transaksi.id_status', '=','tb_status_transaksi.id_status')
               ->select('tr_transaksi.*', 'tb_book.judul', 'tb_user.nama','tb_status_transaksi.nama_status')
               ->get();
    }

    public function detailData($id)
    {
        return DB::table(self::table)
               ->join('tb_user', 'tr_transaksi.id_user', '=','tb_user.id_user')
               ->join('tb_book', 'tr_transaksi.id_buku', '=','tb_book.id_buku')
               ->join('tb_status_transaksi', 'tr_transaksi.id_status', '=','tb_status_transaksi.id_status')
               ->select('tr_transaksi.*', 'tb_book.judul', 'tb_user.nama','tb_status_transaksi.nama_status')
               ->where(self::primary, $id)
               ->first();
    }

    public function tambahData($data)
    {
        DB::table(self::table)->insert($data);
    }

    public function suntingData($id, $data)
    {
        DB::table(self::table)->where(self::primary,$id)->update($data);
    }

    public function hapusData($id)
    {
        DB::table(self::table)->where(self::primary,$id)->delete();
    }
}
