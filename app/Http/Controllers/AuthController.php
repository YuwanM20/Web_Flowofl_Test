<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Akun;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    public function __construct()
    {
        $this->Akun = new Akun();
    }

    public function indexx(){
        if(!session('login')){
            return redirect('/admin/login');
        }else{
        $lari = [
            'lari' => $this->Akun->tampil(),
        ];
        return view('akun.akun',$lari);
    }
}


    public function hapusakun($id){
        if(!session('login')){
            return redirect('/admin/login');
        }else{
        $this->Akun->hapusakun($id);
        return redirect()->route('akun');
        }
    }


    public function bk(){
        return view('bikinakun');
    }

    public function savebk(){
        
        request()->validate([
            'nama' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        $data = [
            'nama' => Request()->nama,
            'email' => Request()->email,
            'password' => Hash::make(Request()->password),
            'tanggal' => Request()->tanggal,
        ];

        $this->Akun->addData($data);

        return redirect('/admin/login');
    }
    


    public function submit(){
        return view('login');
    }


    public function auth(){
        request()->validate([
            'email' => 'required',
            'password' => 'required',
        ]);


        $data = $this->Akun->DetailData(request()->email);


        if($data == ''){
            return redirect('/login');
        }else{
            if (Hash::check(request()->password, $data->password)) {
                session()->put([
                    'id' => $data->id,
                    'nama' => $data->nama,
                    'email' => $data->email,
                    'login' => true,
                ]);

                return redirect('/dashboard');
            }
        }
    }

    
    public function logout(){
        session()->flush();
        return redirect('/');
    }



}