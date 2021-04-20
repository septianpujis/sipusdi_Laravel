<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class M_buku extends Model
{
    public function allData()	
    {
    	return DB::table('tb_book')->get();
    }

    public function detailData($id_buku)
    {
    	return DB::table('tb_book')->where('id_buku', $id_buku)->first();
    }

    public function tambahData($data)
    {
    	DB::table('tb_book')->insert($data);
    }

    public function suntingData($id, $data)
    {
    	DB::table('tb_book')->where('id_buku',$id)->update($data);
    }

    public function hapusData($id)
    {
    	DB::table('tb_book')->where('id_buku',$id)->delete();
    }

}
