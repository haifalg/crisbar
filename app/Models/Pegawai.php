<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Pegawai extends Model
{
    use HasFactory;
    protected $table = 'pegawai';
    // list kolom yang bisa diisi
    protected $fillable = ['id_pegawai','nama_pegawai','alamat_pegawai', 'no_telpon_pegawai'];

    // query nilai max dari id pegawai untuk generate otomatis id pegawai
    public function getIdPegawai()
    {
        // query id pegawai
        $sql = "SELECT IFNULL(MAX(id_pegawai), 'PG-000') as id_pegawai 
                FROM pegawai";
        $id_pegawai = DB::select($sql);

        // cacah hasilnya
        foreach ($id_pegawai as $idpgw) {
            $id_pegawai = $idpgw->id_pegawai;
        }
        // Mengambil substring tiga digit akhir dari string PG-000
        $noawal = substr($id_pegawai,-3);
        $noakhir = $noawal+1; //menambahkan 1, hasilnya adalah integer cth 1
        
        //menyambung dengan string PG-001
        $noakhir = 'PG-'.str_pad($noakhir,3,"0",STR_PAD_LEFT); 

        return $noakhir;
    }
}

    