@extends('depan.partials.layout')
@section('content')
      <div class="site-wrap js-site-wrap">
        <!-- BEGIN BREADCRUMBS-->
        <nav class="breadcrumbs">
          <div class="container">

          </div>
        </nav>
        <!-- END BREADCRUMBS-->
        <div class="center">
          <div class="container">
            <div class="row">
              <div class="col-md-8 col-md-offset-2">
                  <h1 class="text-center">Request Pembelian Rumah</h1>
                  <br>
                  <form action="{{route('kontrakan.simpan',['id'=>$kontrakan->id])}}" method="post">
                    {{csrf_field()}}
                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                    <input type="hidden" name="kontrakan_id" value="{{$kontrakan->id}}">
                    <div class="form-group">
                      <label>Nama Lengkap</label>
                      <input type="text" name="name" value="{{Auth::user()->name}}" required readonly class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Nama Perumahan</label>
                      <input type="text" name="namakos" value="{{$kontrakan->judul}}" required readonly class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Alamat Rumah</label>
                      <input type="text" name="alamatkontrakan" value="{{$kontrakan->alamat}}" required readonly class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Nomor HP</label>
                      <input type="text" name="nomorhp" required class="form-control">
                    </div>
                    <input type="submit" name="submit" value="Pesan Rumah" class="btn btn-success">
                  </form>
              </div>
            </div>
          </div>
        </div>
      @endsection
