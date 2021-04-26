<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class M_buku extends Model
{
    const table = 'tb_book';
    const primary = 'id_buku';

    public function allData()   
    {
        return DB::table(self::table)->get();
    }

    public function detailData($id)
    {
        return DB::table(self::table)->where(self::primary, $id)->first();
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

    public function searchData($q)
    {
        return DB::table(self::table)
               ->where('judul', 'like','%'. $q.'%')
               ->orWhere('penulis','like','%'.$q.'%')
               ->orWhere('penerbit','like','%'. $q.'%')
               ->get();
    }
}
