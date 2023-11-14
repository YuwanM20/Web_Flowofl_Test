@extends('admin.isi')
@section('konten')
<a href="/tambah/data/produk" type="button" class="btn btn-primary">Tambah data</a>
<br>
<br>
<div class="card" >
    <div class="card-body" >
        <table class="table " style="color: #000000">
          <h2 style="color: #3399ff" >Data Menu</h2>
            <thead>
              <tr>
                <th scope="col">id</th>
                <th scope="col">Kode</th>
                <th scope="col">Nama</th>
                <th scope="col">Jenis</th>
                <th scope="col">Harga</th>
                <th scope="col">Gambar</th>
                <th scope="col">Aksi</th>
                
              </tr>
            </thead>
            <tbody>
              @foreach ($lari as $i)
              <tr>
                <th scope="row">{{$loop->iteration}}</th>
                {{-- <td>{{$i->kode_produk}}</td> --}}
                <td>{!! DNS2D::getBarcodeHTML($i->kode_produk, 'QRCODE',06,06); !!} <br>{{$i->kode_produk}} </td>
                <td>{{$i->nama_produk}}</td>
                <td>{{$i->jenis_produk}}</td>
                <td>{{ number_format($i->harga, 0, ',', '.') }}</td>


                <td><img src=" {{asset('gambarmenu')}}/{{$i->gambar}}" style="width:160px; height:145px;" alt=""></td>
               
                <td>  
                <a href="/edit/data/{{$i->kode_produk}}"><button type="button" class="btn btn-success">edit</button></a>
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapus{{$i->kode_produk}}">
                  
                  Delete</button>
                </td>
              </tr>
              @endforeach
              
            </tbody>
          </table>
    </div>
  </div>
    

@foreach ($lari as $b)
      <!-- Modal -->
<div class="modal fade" id="hapus{{$b->kode_produk}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
       <h5>apakah kamu ingin menghapus {{$b->nama_produk}}</h5>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a href="/hapus/data/{{$b->kode_produk}}" class="btn btn-primary">Hapus</a>

      </div>
    </div>
  </div>
</div>
@endforeach
@endsection