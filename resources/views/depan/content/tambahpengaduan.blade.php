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
                <h1 class="text-center">Form Pengaduan</h1>
                <br>
                <form enctype="multipart/form-data" action="{{ route('pengaduan.store') }}" method="post">
                  {{ csrf_field() }}
                  <div class="form-group">
                    <label for="judul">Nama Lengkap</label>
                    <input type="text" name="nama" class="form-control" required="true" value="{{$user->name}}" readonly>
                  </div>
                  <div class="form-group">
                    <label for="judul">Judul</label>
                    <input type="text" name="judul" class="form-control" required="true">
                  </div>
                  <div class="form-group">
                    <label for="judul">isi Pesan</label>
                    <textarea name="isi" rows="8" cols="80" required class="form-control"></textarea>
                  </div>
                  <div class="form-group">
                    <input type="submit" name="submit" value="Kirim Pengaduan" class="btn btn-success">
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      @endsection
