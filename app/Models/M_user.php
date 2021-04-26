<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class M_user extends Model
{
	const table = 'tb_user';
    const primary = 'id_user';

    public function allData()   
    {
        return DB::table(self::table)
               ->join('tb_kode_kelas', 'tb_user.id_kelas', '=' ,'tb_kode_kelas.id_kelas')
               ->select('tb_user.*', 'tb_kode_kelas.nama_kelas')
               ->get();
    }

    public function detailData($id)
    {
        return DB::table(self::table)
               ->join('tb_kode_kelas', 'tb_user.id_kelas', '=' ,'tb_kode_kelas.id_kelas')
               ->select('tb_user.*', 'tb_kode_kelas.nama_kelas')
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

    public function allKelas()
    {
        return DB::table('tb_kode_kelas')->get();
    }

    public function loginData($email,$password)
    {
        return DB::table(self::table)
               ->where('email', $email)
               ->where('password',$password)
               ->first();
    }

    public function searchData($q)
    {
        return DB::table(self::table)
               ->join('tb_kode_kelas', 'tb_user.id_kelas', '=' ,'tb_kode_kelas.id_kelas')
               ->select('tb_user.*', 'tb_kode_kelas.nama_kelas')
               ->where('nama', 'like','%'. $q.'%')
               ->get();
    }
}
