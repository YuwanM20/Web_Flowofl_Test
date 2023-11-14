<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pesan;

class PesanController extends Controller
{
    public function __construct(){
        $this ->Pesan = new Pesan;
        
    }

    

    public function index(){ 
        if(!session('login')){
            return redirect('/admin/login');
        }else{
        $lari = [
            'lari' => $this->Pesan->tampil(),
        ];
        return view ('Pesan.pesan' ,$lari);
    }
}

    //tambah pesan
    public function add(){
        if(!session('login')){
            return redirect('/admin/login');
        }else{
        return view ('pesan.addpesan');
    }
}

    public function save(){
        if(!session('login')){
            return redirect('/admin/login');
        }else{
        Request()->validate([
            'nama' => 'required|max:250',
            'pesan' => 'required|max:250',

        ],[   
            'nama.required' => 'nama wajib diisi yah',
            'pesan.required' => 'pesan wajib diisi yah',
        ]);

        $data = [
            'nama'=> request()->nama,
            'pesan'=>request()->pesan,
            'tanggal'=> request()->tanggal,
        ];

        $this->Pesan->addpesan($data);
        return redirect()->route('pesan');
}
    }

public function hapuspesan($id){
    $this->Pesan->hapuspesan($id);
    return redirect()->route('pesan');
}

}
