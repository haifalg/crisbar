<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

class Perusahaan extends Model
{
    use HasFactory;
    protected $table = 'produk';
    // list kolom yang bisa diisi
    protected $fillable = ['kode_produk','nama_produk','harga','jenis_produk'];

    // query nilai max dari kode perusahaan untuk generate otomatis kode perusahaan
    static public function getKodeProduk()
    {
        // query kode perusahaan
        $sql = "SELECT IFNULL(MAX(kode_produk), 'PR-000') as kode_produk
                FROM produk";
        $kodeproduk = DB::select($sql);

        // cacah hasilnya
        foreach ($kode_produk as $kdprsh) {
            $kd = $kdprsh->kkode_produk;
        }
        // Mengambil substring tiga digit akhir dari string PR-000
        $noawal = substr($kd,-3);
        $noakhir = $noawal+1; //menambahkan 1, hasilnya adalah integer cth 1
        
        //menyambung dengan string PR-001
        $noakhir = 'PR-'.str_pad($noakhir,3,"0",STR_PAD_LEFT); 

        return $noakhir;

    }
}