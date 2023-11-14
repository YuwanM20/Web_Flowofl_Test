@extends('admin.isi')
@section('konten')
<div class="card">
    <div class="card-body">
        <h2 style="color: #3399ff">Edit Data Menu</h2>
        <div class="dropdown-divider"></div>
        <br>

        <form action="/update/{{$main->kode_produk}}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="formGroupExampleInput">Nama Produk</label>
                        <input name="nama" type="text" class="form-control" id="formGroupExampleInput"
                            value="{{$main->nama_produk}}">
                        @error('nama')
                        <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="formGroupExampleInput">Jenis Menu</label>
                        <div class="input-group">
                            <select class="custom-select" id="inputGroupSelect02" name="jenis">
                                <option selected>{{$main->jenis_produk}}</option>
                                <option>MAKANAN</option>
                                <option>MINUMAN</option>
                                <option>SNACK</option>
                            </select>
                        </div>
                        @error('jenis')
                        <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="formGroupExampleInput">Harga</label>
                        <input name="harga" type="text" pattern="[0-9]+" title="Harga harus berupa angka" class="form-control" id="formGroupExampleInput"
                            value="{{$main->harga}}">
                        @error('harga')
                        <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Ganti Gambar</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input name="gambar" type="file" class="custom-file-input" placeholder="gambar"
                                    value="{{$main->gambar}}" id="inputGroupFile04">
                                <label class="custom-file-label" for="inputGroupFile04">Pilih gambar</label>
                                @error('gambar')
                                <small class="form-text text-danger">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <img src="{{asset('gambarmenu')}}/{{$main->gambar}}" width="150px" class="mt-3 rounded"
                            style="max-height: 200px; object-fit: contain;"> <= lama ||  baru =>
    
                        <img id="previewImage" src="" width="150px" class="mt-3 rounded"
                                    style="max-height: 200px; object-fit: contain;"> 
                        </div>

                </div>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-success">Update</button>
            </div>
        </form>
    </div>
</div>


<script>
    // Mengambil elemen input gambar
    const inputGambar = document.querySelector('#inputGroupFile04');
    // Mengambil elemen img untuk preview gambar
    const previewImage = document.querySelector('#previewImage');

    // Mendaftarkan event listener ketika gambar dipilih
    inputGambar.addEventListener('change', function () {
        // Memeriksa apakah ada file gambar yang dipilih
        if (inputGambar.files && inputGambar.files[0]) {
            // Membaca file gambar yang dipilih
            const reader = new FileReader();

            // Event listener ketika proses pembacaan selesai
            reader.onload = function (e) {
                // Menampilkan gambar yang dibaca ke elemen img preview
                previewImage.src = e.target.result;
            };

            // Membaca file gambar sebagai URL data
            reader.readAsDataURL(inputGambar.files[0]);
        }
    });
</script>


<br>
<a href="/data/produk" type="button" class="btn btn-primary " style="float: right;">Kembali</a>
<br>
<br>
<br>
  @endsection