@extends('admin.isi')
@section('konten')

<form action="/simpan/pesan" method="POST" enctype="multipart/form-data">
    @csrf

<div class="card shadow mb-4">
    <div class="card-header py-3" style="background: #18d26e">
        <h4 class="m-0  text-white">Tambah Pesan</h4>
    </div>
    <div class="card-body" id="card-body">

        <div class="form row">

           {{-- NAMA --}}
           <div class="form-group col-sm-6">
               <label for="formGroupExampleInput2">Nama</label>
               <input name="nama" type="text" class="form-control" id="formGroupExampleInput2" placeholder="Masukkan Nama">
               @error('nama')
               <small class="form-text text-danger">{{$message}}</small>
           @enderror
             </div>

                 <div class="form-group col-sm-6">
                  <label for="exampleFormControlTextarea1">Pesan</label>
                  <textarea name="pesan" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                  @error('pesan')
                  <small class="form-text text-danger">{{$message}}</small>
              @enderror
                </div>

                
             
             <input type="hidden" name="tanggal" value="<?php echo date("Y-m-d"); ?>">



           </div>
           <br>
           <button type="submit" class="btn text-white" style="background: #18d26e" class="text-left" >Tambah</button>
         </form>
         
    </div>
</div>
<a href="/data/pesan" type="button" class="btn text-white" style="background: #5846f9; float: right">Kembali</a>
    <br>

    @endsection
