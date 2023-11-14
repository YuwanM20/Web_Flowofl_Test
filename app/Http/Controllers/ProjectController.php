<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;
use \Milon\Barcode\DNS1D;

class ProjectController extends Controller
{
    public function __construct(){
        $this ->Menu = new Menu;
        
    }
    public function index(){ 
        if(!session('login')){
            return redirect('/admin/login');
        }else{
        $lari = [
            'lari' => $this->Menu->tampil(),
        ];
        return view ('Menu.menu' ,$lari);
    }
}

    public function db(){ 
        if(!session('login')){
            return redirect('/admin/login');
        }else{
        return view ('dashboard');
    }
}





    //edit menu 
    public function edit($kode_produk){
        if(!session('login')){
            return redirect('/admin/login');
        }else{
        $data = [
            'main' => $this->Menu->editdata($kode_produk),
        ];
        return view ('Menu.editmenu',$data);
    }
    }


    public function update($kode_produk){
        if(!session('login')){
            return redirect('/admin/login');
        }else{
        request()->validate([
            'kode_produk'=> 'required|max:255',
            'nama' => 'required|max:255',
            'jenis' => 'required|max:255',
            'harga' => 'required numeric',
        ],[
            
            'nama.required' => 'Nama produk Wajib Diisi',
            'harga.required' => 'Harga wajib Diisi',
        ]);

        if /*jika ingin ganti foto */(Request()->gambar <> ""){
            $gambar = request()->gambar;
        $namagambar = request()->nama.'.'.$gambar->extension();
        $gambar->move(public_path('gambarmenu/'),$namagambar);

        $data = [
            'nama_produk'=> request()->nama, 
            'jenis_produk'=> request()->jenis, 
            'harga'=> request()->harga, 
            'gambar'=>$namagambar,
        ];

        $this->Menu->ubahdata($kode_produk, $data);

        } else /*jika tidak ingin ganti foto*/ {
            $data = [
                'nama_produk'=> request()->nama, 
                'jenis_produk'=> request()->jenis, 
                'harga'=> request()->harga,
                
            ];
    
            $this->Menu->ubahdata($kode_produk, $data);
        }

        
        return redirect()->route('produk');
    }
}

    //hapus
    public function hapus($kode_produk){
        $this->Menu->hapusData($kode_produk);
        return redirect()->route('produk');
    }


        // tambah produk
        public function add(){
            if(!session('login')){
                return redirect('/admin/login');
            }else{
            return view ('Menu.addmenu');
        }
    }


    public function save(){
        if(!session('login')){
            return redirect('/admin/login');
        }else{
        request()->validate([
            'kode_produk' => 'required|max:255|unique:tbl_menu,kode_produk',
            'nama' => 'required|max:255',
            'jenis' => 'required|max:255',
            'harga' => 'required',
        ],[
            'kode_produk.required' => 'kode produk produk Wajib Diisi',
            'nama.required' => 'Nama Wajib Diisi',
            'harga.required' => 'Harga wajib Diisi',
        ]);

        $gambar = request()->gambar;
        $namagambar = request()->nama.'.'.$gambar->extension();
        $gambar->move(public_path('gambarmenu/'),$namagambar);

        $data = [
            'kode_produk'=>request()->kode_produk,
            'nama_produk'=> request()->nama, 
            'jenis_produk'=> request()->jenis, 
            'harga'=> request()->harga, 
            'gambar'=>$namagambar,
        ];

        $this->Menu->addData($data);
        return redirect()->route('produk');
    }

    }
    
}
