@extends('admin.isi')
@section('konten')
<a href="/tambah/data/pesan" type="button" class="btn btn-primary">Tambah data</a>
<br>
<br>
<div class="card" >
    <div class="card-body" >
        <table class="table " style="color: #000000">
          <h2 style="color: #3399ff" >Data Pesan</h2>
            <thead>
              <tr>
                <th scope="col">id</th>
            
                <th scope="col">Nama</th>
                <th scope="col">Pesan</th>
                <th scope="col">Tanggal</th>
                <th scope="col">aksi</th>
                
              </tr>
            </thead>
            <tbody>
              @foreach ($lari as $i)
              <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{$i->nama}}</td>
                <td>{{$i->pesan}}</td>
                <td>{{$i->tanggal}}</td>
       
                <td>  
                {{-- <a href="/edit/data/{{$i->id}}"><button type="button" class="btn btn-success">edit</button></a> --}}
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapus{{$i->id}}">Delete</button>
                </td>
              </tr>
              @endforeach
              
            </tbody>
          </table>
    </div>
  </div>
    

@foreach ($lari as $b)
    
<div class="modal fade" id="hapus{{$b->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
       apakah kamu ingin menghapus pesan {{$b->nama}}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a href="/hapus/pesan/{{$b->id}}" class="btn btn-primary">Hapus</a>

      </div>
    </div>
  </div>
</div>
@endforeach
@endsection