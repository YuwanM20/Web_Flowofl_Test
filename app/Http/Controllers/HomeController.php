<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Pesan;
use App\Mail\lihatContact;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Picqer\Barcode\BarcodeGeneratorPNG;
use \Milon\Barcode\DNS1D;


class HomeController extends Controller
{
    public function __construct(){
        $this ->Menu = new Menu;
        $this ->Pesan = new Pesan;
        
    }

    public function index(){ 
        $lari = [
            'lari' => $this->Menu->tampil(),
            'chat' => $this->Pesan->tampil(),
        ];
        return view ('frontend.frontend' ,$lari);
    }

    public function homesave(){
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
        return redirect()->route('depan');
        
    }


public function submitcontact(Request $request)
{
  $data = [
    'name' => $request->name,
    'email' =>$request->email,
    'subject' =>$request->subject,
    'message' =>$request->message,
  ];

  Mail::to('custflowolfcafe1@gmail.com')->send (new lihatContact($data));

  Session::flash('message', 'Terima kasih telah memberi saran');
  return redirect()->route('depan');
}

public function removeFromCart($id)
{
    $cart = request()->cookie('shopping_cart');
    if ($cart) {
        $cart_data = json_decode($cart, true);

        // Temukan indeks item yang akan dihapus
        $item_index = -1;
        foreach ($cart_data as $index => $item) {
            if ($item['item_id'] == $id) {
                $item_index = $index;
                break;
            }
        }

        // Jika item ditemukan, hapus dari keranjang
        if ($item_index != -1) {
            unset($cart_data[$item_index]);

            // Perbarui data keranjang
            $cart_data = array_values($cart_data);
            $cart_json = json_encode($cart_data);

            // Simpan kembali data keranjang ke cookie
            return redirect()->back()->withCookie(cookie('shopping_cart', $cart_json));
        }
    }

    return redirect()->back();
}

public function showFrontend()
{
    // Mendapatkan data $cart_data dari sumber data Anda

    $barcodeData = [];
    foreach ($cart_data as $item) {
        $barcodeData[] = $item['item_id'];
    }

    $generator = new BarcodeGeneratorPNG();
    $barcodeImage = $generator->getBarcode(implode(',', $barcodeData), $generator::TYPE_CODE_128);

    return view('frontend.frontend')->with('cart_data', $cart_data)->with('barcodeImage', $barcodeImage);
}

public function generateBarcode()
{
    $cart = request()->cookie('shopping_cart');
    if ($cart) {
        $cart_data = json_decode($cart, true);
        
        $barcodeData = [];
        foreach ($cart_data as $item) {
            $barcodeData[] = $item['item_id'];
        }

        $generator = new BarcodeGeneratorPNG();
        $barcodeImage = $generator->getBarcode(implode(',', $barcodeData), $generator::TYPE_CODE_128);

        return response($barcodeImage)->header('Content-Type', 'image/png');
    }
}



}
