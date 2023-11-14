<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Akun extends Model
{
    public function tampil(){
        return DB::table('akun')->get();
    }

    public function DetailData($email){
        return DB::table('akun')
        ->where('email',$email)
        ->first();
    }

    public function addData($data){
        DB::table('akun')->insert($data);
    }

    public function hapusakun($id){
        DB::table('akun')->where('id', $id)->delete();
    }

}
