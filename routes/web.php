<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\GaleryController;
use App\Http\Controllers\PesanController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\CartController;
use Picqer\Barcode\BarcodeGeneratorPNG;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



// Route for adding item to cart
Route::post('/add-to-cart', [CartController::class, 'addToCart'])->name('add-to-cart');

// Route for removing item from cart
Route::get('/remove-from-cart/{id}', [CartController::class, 'removeFromCart'])->name('remove-from-cart');

// Route for clearing the entire cart
Route::get('/clear-cart', [CartController::class, 'clearCart'])->name('clear-cart');

// web.php
// Route::get('/remove-from-cart/{id}', 'CartController@removeFromCart')->name('remove-from-cart');



Route::get('/generate-barcode', 'HomeController@generateBarcode')->name('generate-barcode');



Route::get('/', [HomeController::class, 'index'])->name('depan');
Route::post('/simpan/data/pesan', [HomeController::class, 'homesave']);
Route::post('contact', [HomeController::class,'submitcontact'])->name('contact.submit');

Route::get('/sokasik', function () {
    return view('sok');
});

Route::get('/delete/{id}', 'YourController@delete')->name('delete');


Route::get('/data/produk', [ProjectController::class, 'index'])->name('produk');
Route::get('/tambah/data/produk', [ProjectController::class, 'add']);
Route::post('/simpan/produk', [ProjectController::class, 'save']);
Route::get('/hapus/data/{kode_produk}',[ProjectController::class, 'hapus']);
Route::get('/edit/data/{kode_produk}', [ProjectController::class, 'edit']);
Route::post('/update/{kode_produk}', [ProjectController::class, 'update']);


Route::get('/data/gambar', [GaleryController::class, 'index'])->name('gambar');


Route::get('/data/pesan', [PesanController::class, 'index'])->name('pesan');
Route::get('/tambah/data/pesan', [PesanController::class, 'add']);
Route::post('/simpan/pesan', [PesanController::class, 'save']);
Route::get('/hapus/pesan/{id}',[PesanController::class, 'hapuspesan']);

Route::get('/dashboard', [ProjectController::class, 'db']);

// Auth
Route::get('/admin/login',[AuthController::class,'submit']);
Route::post('/authlogin',[AuthController::class,'auth']);
Route::get('/logout',[AuthController::class,'logout']);

Route::get('/bikin/akun', [AuthController::class, 'bk']);
Route::post('/simpan/akun',[AuthController::class,'savebk']);

//akun
Route::get('/data/akun', [AuthController::class, 'indexx'])->name('akun');
Route::get('/hapus/akun/{id}',[AuthController::class, 'hapusakun']);

Route::get('/sampah', function() {

    Artisan::call('cache:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    return "Cleared!";
    });


Route::post('/cart/add', function (Request $request) {
    $product = $request->input('product');
    
    // Mendapatkan data keranjang dari Session
    $cart = Session::get('cart', []);
    
    // Menambahkan produk ke keranjang
    $cart[] = $product;
    
    // Menyimpan data keranjang kembali ke Session
    Session::put('cart', $cart);
    
    return redirect()->back()->with('success', 'Produk telah ditambahkan ke keranjang.');
});

