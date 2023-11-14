<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>FLOWOLF CAFE DAY</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <!-- Favicons -->
  <!-- <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon"> -->

  <!-- Google Fonts -->
  <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css'>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('web')}}/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="{{asset('web')}}/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="{{asset('web')}}/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="{{asset('web')}}/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="{{asset('web')}}/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="{{asset('web')}}/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('web')}}/assets/css/style.css" rel="stylesheet">


</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center justify-content-between">
      <h1 class="logo"><a>FLOWOLF CAFE</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
  
      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Utama</a></li>
          <li><a class="nav-link scrollto" href="#about">Tentang Kami</a></li>
          <!-- <li><a class="nav-link scrollto" href="#services">Menu</a></li> -->
          <li><a class="nav-link scrollto" href="#portfolio">Menu</a></li>
          <li><a class="nav-link scrollto" href="#galeryy">Galery</a></li>

          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
      
          <!-- <li><a class="getstarted scrollto" href="#about">Get Started</a></li> -->
          <li class="button-container"><button type="button" class="btn ccps" style="font-size: 30px;" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="bx bxs-basket"></i></button></li>
          <!-- <button type="button" class="btn ccps" style="font-size: 30px;" data-toggle="modal" data-target=".bd-example-modal-lg"> <i class="bx bxs-basket"></i></button> -->
          <!-- <div id="openModalBtn" class="btn ccps" style="font-size: 30px;"><i class="bx bxs-basket"></i></div> -->
        </ul>
        <i class="bi bi-list scrollto mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
    </div>
  </header><!-- End Header -->
  


            <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"  aria-labelledby="myLargeModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg" style="margin-top: 100px;">
                  <div class="modal-content" >
                      <div class="modal-header" style="background-color: #5846f9;">
                          <h5 class="modal-title text-white" >Keranjang Kamu</h5>
                      </div>
                      <div class="modal-body">
                          <table class="table">
                              <thead class="thead" style="background-color: #464646;">
                                  <tr>
                                      <th scope="col">#</th>
                                      <th scope="col">Nama</th>
                                      <th scope="col">Total</th>
                                      <th scope="col">Harga</th>
                                      <th scope="col">Aksi</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  @php
                                      $cart = request()->cookie('shopping_cart');
                                      $total = 0;
                                      if ($cart) {
                                          $cart_data = json_decode($cart, true);
                                          foreach ($cart_data as $key => $item) {
                                              $total += $item['item_quantity'] * $item['item_price'];
                                  @endphp
                                  <tr>
                                      <th scope="row">{{ $key + 1 }}</th>
                                      <td>{{ $item['item_name'] }}</td>
                                      <td>{{ $item['item_quantity'] }}</td>
                                      <td>Rp. {{ number_format($item['item_price'], 0, ',', '.') }}</td>
                                      <td><a class="btn btn-danger" href="{{ route('remove-from-cart', ['id' => $item['item_id']]) }}">Hapus</a></td>
                                  </tr>
                                  @php
                                          }
                                      } else {
                                  @endphp
                                  <tr>
                                      <td colspan="5" align="center">No Item in Cart</td>
                                  </tr>
                                  @php
                                      }
                                  @endphp
                              </tbody>
                              <tr>
                                  <td>SubTotal:</td>
                                  <td></td>
                                  <td></td>
                                  <td>Rp. {{ number_format($total, 2, ',', '.') }}</td>
                              </tr> 
                          </table>
                      </div>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                          {{-- <button type="button" class="btn btn-primary" onclick="window.open('{{ route('generate-barcode') }}', '_blank')">Generate</button> --}}
<button type="button" class="btn btn-primary" onclick="masaaf()">Generate</button>
                          {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#brcode">Generate</button> --}}
                      </div>
                  </div>
              </div>
          </div>

          <script>
            function masaaf() {
    
             Swal.fire("Maaf Fitur ALL BARCODE masih belum bisa"," ", "error");
    
    }
    </script>

          
          
 <?php
// use Picqer\Barcode\BarcodeGeneratorPNG;

// $barcodeData = [];
//foreach ($cart_data as $item) {
//  $barcodeData[] = $item['item_id'];
// }

// $generator = new BarcodeGeneratorPNG();
// $barcodeImage = $generator->getBarcode(implode(',', $barcodeData), $generator::TYPE_CODE_128);
?>

<div class="modal fade" id="brcode" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header text-center" style="text-align: center; background-color: #5846f9;">
        <h5 class="modal-title text-white" id="staticBackdropLabel"> SCAN BARCODE</h5>
      </div>
      <div class="modal-body">
        <br>

        {{-- <div style="background-color: white; padding: 10px; display: flex; justify-content: center; align-items: center; border: 1px solid black; height: 100%;">
          <img id="barcodeImage" src="data:image/png;base64,{{ base64_encode($barcodeImage) }}" alt="Barcode" style="max-width: 100%; max-height: 100%;">
        </div> --}}
        <br><br>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <a id="downloadLinkd" href="#" class="btn btn-primary">DOWNLOAD</a>
      </div>
    </div>
  </div>
</div>

<style>
  #barcodeImage {
    background-color: white;
    width: 170px; 
    height: 70px;
  }
</style>

{{-- <script>
  var barcodeData = "{{ base64_encode($barcodeImage) }}";
  var barcodeImgElement = document.getElementById('barcodeImage');
  var downloadLinkElement = document.getElementById('downloadLinkd');

  barcodeImgElement.src = 'data:image/png;base64,' + barcodeData;

  downloadLinkElement.addEventListener('click', function() {
    var downloadUrl = barcodeImgElement.src;
    var a = document.createElement('a');
    a.href = downloadUrl;
    a.download = 'barcode.png';
    document.body.appendChild(a);
    a.click();
    document.body.removeChild(a);
  });
</script> --}}



 


@push('scripts')
  {{-- <script>
    var cartData = {!! json_encode($cart_data) !!};
    var barcodeData = [];

    // Mengambil item_id dari setiap item di keranjang
    cartData.forEach(function(item) {
      barcodeData.push(item.item_id);
    });

    // Menghasilkan barcode dengan menggunakan library Picqer
    var generator = new BarcodeGeneratorPNG();
    var barcodeImage = generator.getBarcode(barcodeData.join(','), generator.TYPE_CODE_128);

    // Menampilkan barcode di elemen gambar
    var barcodeImgElement = document.getElementById('barcodeImage');
    barcodeImgElement.src = 'data:image/png;base64,' + barcodeImage;
  </script> --}}
@endpush




  {{-- <script>                   
  function maaaf() {

    Swal.fire("Barcode Akan Tampil Disini"," ", "success");

}
</script> --}}

  <style>
    @media (max-width: 767px) {
      .modal-dialog{
        margin-top: 100px;
      }
      .pffe{
        float: left;
      }

}

@media (max-width: 467px) {


  .modal-dialog{
        margin-top: 100px;
      }
      .pffe{
        float: left;
      }



    }
  </style>



  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">

    <div class="container-fluid" data-aos="fade-up">
      <div class="row justify-content-center">
        <div class="col-xl-5 col-lg-6 pt-3 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
          <h1>Berkumpul, Berbagi, dan Menikmati
Kebersamaan di Setiap Hidangan</h1>
          <!-- <h2>We are team of talented designers making websites with Bootstrap</h2> -->
          <div><a href="#portfolio" class="btn-get-started scrollto">Beli Sekarang</a></div>
        </div>
        <div class="col-xl-4 col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="150">
          <img src="{{asset('web')}}/assets/img/hero1.png" class="img-fluid animated" alt="">
        </div>
      </div>
    </div>

  </section><!-- End Hero -->



    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="row">
          <div class="col-lg-6 order-1 order-lg-2" data-aos="zoom-in" data-aos-delay="150">
            <img src="{{asset('web')}}/assets/img/abt2.jpg" class="img-fluid" alt="" style="border-radius: 10px;">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content" data-aos="fade-right">
            <h3>Tentang Flowolf Cafe</h3>
            <p class="fst-italic">
              Nikmati kelezatan makanan kami yang terbuat dari bahan-bahan segar dan dipadukan dengan sentuhan kreativitas yang unik. Dari hidangan sarapan yang menggugah selera hingga makanan penutup yang menggoda, kami siap memanjakan lidah Anda dengan cita rasa yang tak terlupakan. Disini kami menjual :
            </p>
            <ul>
              <li><i class="bi bi-check-circle"></i> Makanan</li>
              <li><i class="bi bi-check-circle"></i> Minuman</li>
              <li><i class="bi bi-check-circle"></i> Snack</li>
            </ul>
            <p class="fst-italic">
              Kunjungi kami sekarang dan mari kita mengeksplorasi dunia rasa yang menggembirakan bersama-sama di Café Flowolf, tempat di mana makanan, minuman, dan snack berkualitas tinggi bertemu dalam harmoni sempurna.  
            </p>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->
    <main id="main">


      <section id="portfolio" class="portfolio">
        <div class="container" data-aos="fade-up">
      
          <div class="section-title">
            <h2>Menu</h2>
            <h5>Pilih Menu Kamu Sekarang!</h5>
          </div>
      
          <div class="row">
            <div class="col-lg-12 d-flex justify-content-center">
              <ul id="portfolio-flters">
                <li data-filter="*" class="filter-active">All</li>
                <li data-filter=".filter-MAKANAN">Makanan</li>
                <li data-filter=".filter-MINUMAN">Minuman</li>
                <li data-filter=".filter-SNACK">Snack</li>
              </ul>
            </div>
          </div>
      
          <section class="py-2">
            <div class="container px-4 px-lg-5 mt-1">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                  @foreach ($lari as $i)
                <div class="col mb-5 ">
                    <div class="card h-100 portfolio-item filter-{{$i->jenis_produk}}">
                        <!-- Sale badge-->
                        <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale</div>
                        <div class="d-flex justify-content-left small text-warning mb-2 position-absolute" style="top: 0.3rem; left: 0.5rem" >
                            <div class="bi-star-fill"></div>
                            <div class="bi-star-fill"></div>
                            <div class="bi-star-fill"></div>
                            <div class="bi-star-fill"></div>
                            <div class="bi-star-fill"></div>
                        </div>
                        <!-- Product image-->
                        <img class="card-img-top" src="{{asset('gambarmenu')}}/{{$i->gambar}}" height="150" alt="..." />
                        <!-- Product details-->
                        <div class="card-body p-4">
                            <div class="text-center">
                                <!-- Product name-->
                                <h5 class="fw-bolder">{{$i->nama_produk}}</h5>
                                <!-- Product reviews-->

                                <!-- Product price-->
                                {{-- <span class="text-muted text-decoration-line-through"></span> --}}
                                {{ number_format($i->harga, 0, ',', '.') }}
                                
                            </div>
                        </div>
                        <!-- Product actions-->
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                            <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Pilih</a></div>
                        </div>
                    </div>
                </div>
                @endforeach
                
                </div>
            </div>
          </section>

            {{-- @foreach ($lari as $i)
            <div class="col-lg-3 col-md-6 portfolio-item filter-{{$i->jenis_produk}}">
              <div class="card">
                <img src="{{asset('gambarmenu')}}/{{$i->gambar}}" width="220" height="230" class="portfolio-wrap card-img-top" alt="...">
                <div class="card-body">
                  <h4 class="card-title">{{$i->nama_produk}} </h4>
                  <p class="card-text">{{$i->jenis_produk}} <i style="color: #5846f9;" class="bi bi-patch-check-fill"></i></p>
                  <h5>{!! DNS2D::getBarcodeHTML($i->kode_produk, 'QRCODE',06,06); !!}</h5>
                  <br>
                  <div class="d-flex justify-content-between align-items-center">
                    <h4>{{ number_format($i->harga, 0, ',', '.') }}</h4>
                    <form method="POST" action="{{ route('add-to-cart') }}">
                      @csrf
                      <input type="hidden" name="hidden_id" value="{{$i->kode_produk}}" />
                      <input type="hidden" name="hidden_nama" value="{{$i->nama_produk}}" />
                      <input type="hidden" name="hidden_harga" value="{{$i->harga}}" />
                      <input type="hidden" name="jumlah" value="1" />
                      <input type="submit" name="add_to_cart" class="btn btn-success" value="Add to Cart" />
                    </form>
                  </div>
                </div>
              </div>
            </div>
            @endforeach --}}
      
          </div>
        </div>
      </section>
      
      {{-- <style>
      .portfolio-item {
        margin-bottom: 30px;
      }
      
      .card {
        border-radius: 30px;
        box-shadow: rgba(0, 0, 0, 0.1) 0px 1px 2px 0px;
      }
      
      .card-body {
        padding: 22px;
      }
      
      .card-title {
        margin-bottom: 10px;
      }
      
      .card-text {
        margin-bottom: 15px;
      }
      
      .btn-success {
        border-radius: 50px;
        width: 100%;
      }
      
      .btn-success:hover {
        background-color: #9F54BE;
        border: none;
      }
      </style> --}}
      

    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Testimoni</h2>
          <h5>Apa Kata Mereka Tentang Kami</h5>
        </div>

        <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
          <div class="swiper-wrapper">

            @foreach ($chat as $i)
            <div class="swiper-slide">
              <div class="testimonial-item">
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  {{$i->pesan}}   ({{$i->tanggal}})
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i> 
                </p>
                <img src="{{asset('web')}}/assets/img/testimonials/p122.jpg" class="testimonial-img" alt="">
                <h3>{{$i->nama}}</h3>
                <h4>Pembeli</h4>
               
              </div>
              
            </div><!-- End testimonial item -->
            @endforeach
        

          </div>
          <div class="swiper-pagination"></div>
          
          
        </div>
        <br>
          <br>
        <div class="text-center"><a class="btn btn-primary" data-toggle="modal" data-target="#tmbhpesn" >Tambah</a></div>
       

      </div>
    </section><!-- End Testimonials Section -->

    <!-- Modal -->
    <div class="modal fade" id="tmbhpesn" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header text-center" style="text-align: center; background-color: #5846f9;">
            <h5 class="modal-title text-white" id="staticBackdropLabel">Skuy Tambah Pengalamanmu Di flowolf</h5>
          </div>
          <form action="/simpan/data/pesan" method="POST" enctype="multipart/form-data">
            @csrf
          <div class="modal-body">
            <div class="form-group">
              <label for="formGroupExampleInput2">Nama</label>
              <input name="nama" type="text" class="form-control" id="formGroupExampleInput2" placeholder="Masukkan Nama">
              <br>
              @error('nama')
              <small class="form-text text-danger">{{$message}}</small>
              @enderror
            </div>
            
            <div class="form-group">
              <label for="exampleFormControlTextarea1">Pesan</label>
              <textarea name="pesan" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
              @error('pesan')
              <small class="form-text text-danger">{{$message}}</small>
              @enderror
            </div>
    
            <input type="hidden" name="tanggal" value="<?php echo date("Y-m-d"); ?>">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Tambah</button>
          </div>
          </form>
        </div>
      </div>
    </div>
    

    

    <!-- ======= Features Section ======= -->
    <!-- <section id="features" class="features">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Features</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <div class="row">
          <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column align-items-lg-center">
            <div class="icon-box mt-5 mt-lg-0" data-aos="fade-up" data-aos-delay="100">
              <i class="bx bx-receipt"></i>
              <h4>Est labore ad</h4>
              <p>Consequuntur sunt aut quasi enim aliquam quae harum pariatur laboris nisi ut aliquip</p>
            </div>
            <div class="icon-box mt-5" data-aos="fade-up" data-aos-delay="200">
              <i class="bx bx-cube-alt"></i>
              <h4>Harum esse qui</h4>
              <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt</p>
            </div>
            <div class="icon-box mt-5" data-aos="fade-up" data-aos-delay="300">
              <i class="bx bx-images"></i>
              <h4>Aut occaecati</h4>
              <p>Aut suscipit aut cum nemo deleniti aut omnis. Doloribus ut maiores omnis facere</p>
            </div>
            <div class="icon-box mt-5" data-aos="fade-up" data-aos-delay="400">
              <i class="bx bx-shield"></i>
              <h4>Beatae veritatis</h4>
              <p>Expedita veritatis consequuntur nihil tempore laudantium vitae denat pacta</p>
            </div>
          </div>
          <div class="image col-lg-6 order-1 order-lg-2 " data-aos="zoom-in" data-aos-delay="100">
            <img src="assets/img/features.svg" alt="" class="img-fluid">
          </div>
        </div>

      </div>
    </section> -->
    <!-- End Features Section -->

    <!-- ======= Pricing Section ======= -->
    <!-- <section id="pricing" class="pricing section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Pricing</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <div class="row">

          <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="box">
              <h3>Free</h3>
              <h4><sup>$</sup>0<span> / month</span></h4>
              <ul>
                <li>Aida dere</li>
                <li>Nec feugiat nisl</li>
                <li>Nulla at volutpat dola</li>
                <li class="na">Pharetra massa</li>
                <li class="na">Massa ultricies mi</li>
              </ul>
              <div class="btn-wrap">
                <a href="#" class="btn-buy">Buy Now</a>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-4 mt-md-0" data-aos="fade-up" data-aos-delay="200">
            <div class="box featured">
              <h3>Business</h3>
              <h4><sup>$</sup>19<span> / month</span></h4>
              <ul>
                <li>Aida dere</li>
                <li>Nec feugiat nisl</li>
                <li>Nulla at volutpat dola</li>
                <li>Pharetra massa</li>
                <li class="na">Massa ultricies mi</li>
              </ul>
              <div class="btn-wrap">
                <a href="#" class="btn-buy">Buy Now</a>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="300">
            <div class="box">
              <h3>Developer</h3>
              <h4><sup>$</sup>29<span> / month</span></h4>
              <ul>
                <li>Aida dere</li>
                <li>Nec feugiat nisl</li>
                <li>Nulla at volutpat dola</li>
                <li>Pharetra massa</li>
                <li>Massa ultricies mi</li>
              </ul>
              <div class="btn-wrap">
                <a href="#" class="btn-buy">Buy Now</a>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="400">
            <div class="box">
              <span class="advanced">Advanced</span>
              <h3>Ultimate</h3>
              <h4><sup>$</sup>49<span> / month</span></h4>
              <ul>
                <li>Aida dere</li>
                <li>Nec feugiat nisl</li>
                <li>Nulla at volutpat dola</li>
                <li>Pharetra massa</li>
                <li>Massa ultricies mi</li>
              </ul>
              <div class="btn-wrap">
                <a href="#" class="btn-buy">Buy Now</a>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section> -->
    <!-- End Pricing Section -->

    <!-- ======= Contact Section ======= -->
    <section id="galeryy" class=" section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Galery</h2>
        </div>
        <div class="galleryContainer">
        <div class="gallery">
          <input type="radio" name="controls" id="c1" checked><img class="galleryImage img-fluid" id="i1"
            src="{{asset('web')}}/assets/img/gallery/galery1.png" class="img" alt="">
          <input type="radio" name="controls" id="c2"><img class="galleryImage img-fluid" id="i2"
            src="{{asset('web')}}/assets/img/gallery/galery2.png" class="img" alt="">
          <input type="radio" name="controls" id="c3"><img class="galleryImage img-fluid" id="i3"
            src="{{asset('web')}}/assets/img/gallery/galery3.png" class="img" alt="">
          <input type="radio" name="controls" id="c4"><img class="galleryImage img-fluid" id="i4"
            src="{{asset('web')}}/assets/img/gallery/galery4.png" class="img" alt="">
        </div>

        <div class="thumbnails">
          <label class="thumbnailImage" for="c1"><img src="{{asset('web')}}/assets/img/gallery/galery1.png" class="img img-fluid"
              alt=""></label>
          <label class="thumbnailImage" for="c2"><img src="{{asset('web')}}/assets/img/gallery/galery2.png" class="img img-fluid"
              alt=""></label>
          <label class="thumbnailImage" for="c3"><img src="{{asset('web')}}/assets/img/gallery/galery3.png" class="img img-fluid"
              alt=""></label>
          <label class="thumbnailImage" for="c4"><img src="{{asset('web')}}/assets/img/gallery/galery4.png" class="img img-fluid"
              alt=""></label>

        </div>
      </div>

      <style>
 .galleryContainer {
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  align-content: center;
  position: relative;
}

 .gallery {
  position: relative;
  display: flex;
  justify-content: center;
  align-content: center;
}

 .gallery input {
  display: none;
}

 .galleryImage {
  transition: opacity 0.25s ease-out;
  overflow: hidden;
  position: absolute;
  top: 0;
  left: 0;
  opacity: 0;
  width: 100%;
  height: 100%;
  -o-object-fit: contain;
  object-fit: contain;
}

 .gallery>img:first-of-type {
  position: relative !important;
  display: flex !important;
  top: 0 !important;
  left: 0 !important;
  z-index: 10;
}

.arrowsContainer {
  position: absolute;
  bottom: 0px;
  left: 0px;
  height: 100%;
  display: none;
  justify-content: space-between;
  align-items: flex-end;
  width: 100%;
  z-index: 20;
  overflow: hidden;
}

.arrowsContainer img {
  width: 100px;
  background: white;
  opacity: 0.4;
  padding-bottom: 20px;
  transition: 0.1s ease;
}

 .leftArrow {
  border-top-right-radius: 10px;
  position: absolute;
  bottom: -20px;
  left: -30px;
  padding-left: 40px;
  padding-right: 15px;
}

.rightArrow {
  border-top-left-radius: 10px;
  position: absolute;
  bottom: -20px;
  right: -30px;
  padding-right: 40px;
  padding-left: 15px;
}


 .rightArrow:active {
  transform: scale(0.95, 0.95);
}

 .thumbnails {
  display: flex;
  flex-direction: row;
  justify-content: flex-start;
  flex-wrap: nowrap;
  overflow-x: auto;
  overflow-y: hidden;
  height: 5%;
  margin-top: 10px;
  /*border-left: 6px solid black;*/
  scroll-snap-type: mandatory;
  -ms-scroll-snap-type: x mandatory;
  scroll-snap-type: x mandatory;
  -webkit-overflow-scrolling: touch;
}

.thumbnailImage img {
  width: 100%;
  height: 120px;
  -o-object-fit: cover;
  object-fit: cover;
}

.thumbnailImage {
  margin: 0 5px;
  -moz-scroll-snap-align: start;
  -ms-scroll-snap-align: start;
  scroll-snap-align: start;
}

 .thumbnailImage:first-child {
  margin-left: 0px;
}

 .thumbnailImage:last-child {
  margin-right: 0px;
}

 #c1:checked+#i1 {
  opacity: 1;
}

 #c2:checked+#i2 {
  opacity: 1;
}

 #c3:checked+#i3 {
  opacity: 1;
}

 #c4:checked+#i4 {
  opacity: 1;
}

 #c5:checked+#i5 {
  opacity: 1;
}

 #c6:checked+#i6 {
  opacity: 1;
}

 #c7:checked+#i7 {
  opacity: 1;
}

 #c8:checked+#i8 {
  opacity: 1;
}

 #c9:checked+#i9 {
  opacity: 1;
}

 #c10:checked+#i10 {
  opacity: 1;
}

 #c11:checked+#i11 {
  opacity: 1;
}

 #c12:checked+#i12 {
  opacity: 1;
}

 #c13:checked+#i13 {
  opacity: 1;
}

 #c1:checked+#i1+#arrows1 {
  display: flex;
}

 #c2:checked+#i2+#arrows2 {
  display: flex;
}

 #c3:checked+#i3+#arrows3 {
  display: flex;
}

 #c4:checked+#i4+#arrows4 {
  display: flex;
}

#c5:checked+#i5+#arrows5 {
  display: flex;
}

 #c6:checked+#i6+#arrows6 {
  display: flex;
}

.thumbnails label,
 .arrowsContainer label {
  cursor: pointer;
  overflow: hidden;
  border-radius: 8px;
}

 .thumbnails label img {
  transition: 0.3s ease;
}

.thumbnails label img:hover {
  transform: scale(1.2, 1.2);
}

 label:focus {
  box-shadow: 0px 0px 7px 1px white;
}

@media only screen and (max-width: 650px) {
  .thumbnailImage {
    margin: 0 3px;
    min-height: 80px;
    max-height: 80px;
  }

   .arrowsContainer img {
    width: 70px;
    background: white;
    opacity: 0.4;
    padding-bottom: 20px;
    transition: 0.1s ease;
  }
}

@media screen and (max-width: 480px) {
   .thumbnailImage img {
    height: 80px;
  }

   .thumbnailImage {
    margin: 0 3px;
    min-height: 80px;
    max-height: 80px;
  }
}

@media screen and (max-width: 384px) {
  .thumbnailImage img {
    height: 60px;
  }

   .thumbnailImage {
    min-height: 60px;
    max-height: 60px;
  }
}

      </style>


      </div>
    </section>

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Kontak</h2>
          <h6>Jika anda butuh bantuan anda dapat menghubungi kami melalui form dibawah!</h6>
        </div>

        <div class="row">
          <div class="col-lg-6">
            <div class="info-box mb-4">
              <i class="bx bx-map"></i>
              <h3>Alamat</h3>
              <p>Jalan HOS Cokroaminoto No.110</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="info-box  mb-4">
              <i class="bx bx-envelope"></i>
              <h3>Email Us</h3>
              <p>contact@example.com</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="info-box  mb-4">
              <i class="bx bx-phone-call"></i>
              <h3>No HP</h3>
              <p>+62 812-3263-2569</p>
            </div>
          </div>

        </div>

        <div class="row">

          <div class="col-lg-6 ">
            <iframe class="mb-4 mb-lg-0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3951.7762159917124!2d113.83188429411068!3d-7.91842881744055!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd6dd9923b0ed3f%3A0x69e1054b7c4485bd!2sFlowolf%20Cafe!5e0!3m2!1sid!2sid!4v1685693452108!5m2!1sid!2sid" frameborder="0" style="border:0; width: 100%; height: 384px;" allowfullscreen></iframe>
          </div>


          <div class="col-lg-6">
            <div class="phpmaill">
             
                {!! Form::open(['route'=>'contact.submit'])!!}
                @if(Session::has('message'))
                          <div class="alert text-white" style="background: #5846f9">
                          {{Session('message')}}
                          </div>
                          @endif
                          <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
              </div>
            
            <br>
          
            <div class="text-center"><button onclick="submiter" type="submit">Send Message</button></div>
              {!!Form::close()!!}
            
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

    <script>

</script>

  </main><!-- End #main -->

      <!-- ======= Frequently Asked Questions Section ======= -->
      <!-- <section id="faq" class="faq">
        <div class="container" data-aos="fade-up">
  
          <div class="section-title">
            <h2>Frequently Asked Questions</h2>
            <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
          </div>
  
          <div class="faq-list">
            <ul>
              <li data-aos="fade-up" data-aos="fade-up" data-aos-delay="100">
                <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" class="collapse" data-bs-target="#faq-list-1">Non consectetur a erat nam at lectus urna duis? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                <div id="faq-list-1" class="collapse show" data-bs-parent=".faq-list">
                  <p>
                    Feugiat pretium nibh ipsum consequat. Tempus iaculis urna id volutpat lacus laoreet non curabitur gravida. Venenatis lectus magna fringilla urna porttitor rhoncus dolor purus non.
                  </p>
                </div>
              </li>
  
              <li data-aos="fade-up" data-aos-delay="200">
                <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-2" class="collapsed">Feugiat scelerisque varius morbi enim nunc? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                <div id="faq-list-2" class="collapse" data-bs-parent=".faq-list">
                  <p>
                    Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.
                  </p>
                </div>
              </li>
  
              <li data-aos="fade-up" data-aos-delay="300">
                <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-3" class="collapsed">Dolor sit amet consectetur adipiscing elit? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                <div id="faq-list-3" class="collapse" data-bs-parent=".faq-list">
                  <p>
                    Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis orci. Faucibus pulvinar elementum integer enim. Sem nulla pharetra diam sit amet nisl suscipit. Rutrum tellus pellentesque eu tincidunt. Lectus urna duis convallis convallis tellus. Urna molestie at elementum eu facilisis sed odio morbi quis
                  </p>
                </div>
              </li>
  
              <li data-aos="fade-up" data-aos-delay="400">
                <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-4" class="collapsed">Tempus quam pellentesque nec nam aliquam sem et tortor consequat? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                <div id="faq-list-4" class="collapse" data-bs-parent=".faq-list">
                  <p>
                    Molestie a iaculis at erat pellentesque adipiscing commodo. Dignissim suspendisse in est ante in. Nunc vel risus commodo viverra maecenas accumsan. Sit amet nisl suscipit adipiscing bibendum est. Purus gravida quis blandit turpis cursus in.
                  </p>
                </div>
              </li>
  
              <li data-aos="fade-up" data-aos-delay="500">
                <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-5" class="collapsed">Tortor vitae purus faucibus ornare. Varius vel pharetra vel turpis nunc eget lorem dolor? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                <div id="faq-list-5" class="collapse" data-bs-parent=".faq-list">
                  <p>
                    Laoreet sit amet cursus sit amet dictum sit amet justo. Mauris vitae ultricies leo integer malesuada nunc vel. Tincidunt eget nullam non nisi est sit amet. Turpis nunc eget lorem dolor sed. Ut venenatis tellus in metus vulputate eu scelerisque.
                  </p>
                </div>
              </li>
  
            </ul>
          </div>
  
        </div>
      </section> -->
      <!-- End Frequently Asked Questions Section -->


  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>FLOWOLF CAFE</h3>
            <p>
              Jalan HOS Cokroaminoto No.110 <br>
              Kademangan<br>
              Kabupaten Bondowoso <br><br>
              <strong>Phone:</strong> +62 812-3263-2569<br>
              <strong>Email:</strong> info@example.com<br>
            </p>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Jam Buka</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i>SENIN - MINGGU </li>
              <li><i class="bx bx-chevron-right"></i>PUKUL 10:00 - 01:00</li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Subscribe</h4>
            <p>Subscribe sekarang agar kamu mendapatkan informasi terbaru dari FLOWOLF</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>
          </div>

        </div>
      </div>
    </div>

    <div class="container">

      <div class="copyright-wrap d-md-flex py-4">
        <div class="me-md-auto text-center text-md-start">
          <div class="copyright">
            &copy; Copyright <strong><span>FLOWOLF CAFE  2023</span></strong>. All Rights Reserved
          </div>
          <!-- <div class="credits">
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
          </div> -->
        </div>
        <div class="social-links text-center text-md-right pt-3 pt-md-0">
          <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
          <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
          <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
          <!-- <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
          <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a> -->
        </div>
      </div>

    </div>
  </footer><!-- End Footer -->

  {{-- <script>
    // fungsi untuk menampilkan popup
    function showPopup() {
      // menampilkan popup menggunakan sweetalert
      swal({
        imageUrl: "{{asset('web')}}/PGIP.gif",
        imageWidth: 150,
        imageHeight: 150,
        title: "Hi FLOWOLFERS",

      }).then(function() {
        // event listener pada tombol "OK" pada popup
        var audio = new Audio('');
        audio.loop = true;
        audio.play();
      });
    }
  
    // atur waktu tampilan popup dalam milidetik (1000 ms = 1 detik)
    var popupDelay = 100; // 5 detik
          
    // atur event yang memicu tampilan popup
    window.onload = function() {
      setTimeout(function() {
        showPopup();
      }, popupDelay);
    }
  </script> --}}

<a data-target=".bd-example-modal-lg" class="back-to-toppp d-flex align-items-center justify-content-center" data-toggle="modal">
  <i class="bx bxs-basket"></i>
</a>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="{{asset('web')}}/assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="{{asset('web')}}/assets/vendor/aos/aos.js"></script>
  <script src="{{asset('web')}}/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="{{asset('web')}}/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="{{asset('web')}}/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="{{asset('web')}}/assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="{{asset('web')}}/assets/vendor/php-email-form/validate.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

      <!-- Option 1: Bootstrap Bundle with Popper -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
      <script src=" https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('web')}}/assets/js/main.js"></script>

</body>

</html>