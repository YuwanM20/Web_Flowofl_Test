<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Picqer\Barcode\BarcodeGeneratorPNG;


class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $item_id = $request->input("hidden_id");
        $item_name = $request->input("hidden_nama");
        $item_price = $request->input("hidden_harga");
        $quantity = $request->input("jumlah");

        $cart = $request->cookie("shopping_cart");
        $cart_data = $cart ? json_decode($cart, true) : [];

        $item_exists = false;

        foreach ($cart_data as $key => $item) {
            if ($item['item_id'] == $item_id) {
                $cart_data[$key]['item_quantity'] += $quantity;
                $item_exists = true;
                break;
            }
        }

        if (!$item_exists) {
            $item_array = [
                'item_id' => $item_id,
                'item_name' => $item_name,
                'item_price' => $item_price,
                'item_quantity' => $quantity
            ];

            $cart_data[] = $item_array;
        }

        $cookie_data = json_encode($cart_data);

        return redirect('/')->withCookie(Cookie::make('shopping_cart', $cookie_data, 30 * 24 * 60));
    }


    public function clearCart()
    {
        return redirect('/')->withCookie(Cookie::forget('shopping_cart'))->with("clearall", "Your Shopping Cart has been cleared");
    }



    public function remove($id)
    {
        if (isset($_COOKIE["shopping_cart"])) {
            $cookie_data = stripslashes($_COOKIE["shopping_cart"]);
            $cart_data = json_decode($cookie_data, true);

            foreach ($cart_data as $key => $item) {
                if ($item["item_id"] == $id) {
                    unset($cart_data[$key]);
                    $item_data = json_encode($cart_data);
                    setcookie("shopping_cart", $item_data, time() + (86400 * 30));
                    break;
                }
            }
        }

        return redirect('/')->with('success', 'Item removed from Cart');
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
