<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Pesan extends Model
{
    public function tampil(){
        return DB::table('pesan')->get();
    }

    public function addpesan($data){
        return DB::table('pesan')->insert($data);
     }

     public function hapuspesan($id){
        DB::table('pesan')->where('id', $id)->delete();
    }
    
}
