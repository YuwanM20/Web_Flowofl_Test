<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Menu extends Model
{
    public function tampil(){
        return DB::table('tbl_menu')->get();
    }
    
    public function editdata($kode_produk){
        return DB::table('tbl_menu')->where('kode_produk', $kode_produk)->first();
     }

     public function ubahdata($kode_produk, $data){
        return DB::table('tbl_menu')->where('kode_produk', $kode_produk)->update($data);
     }

     public function hapusData($kode_produk){
        $namagambar= DB::table('tbl_menu')->where('kode_produk', '=', $kode_produk)->pluck('gambar')->first();
        $namafile = public_path('gambarmenu/').$namagambar;
      
        if($namagambar=null){
         return DB::table('tbl_menu')->where('kode_produk', '=', $kode_produk)->delete();
        }else{
           @unlink($namafile);
            return DB::table('tbl_menu')->where('kode_produk', '=', $kode_produk)->delete();
        }
      
         }

         public function addData($data){
            return DB::table('tbl_menu')->insert($data);
         }


}
