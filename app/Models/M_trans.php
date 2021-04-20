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
}
