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
                  <h1 class="text-center">Request Pemesanan Kamar Kos</h1>
                  <br>
                  <form action="{{route('kos.orderkos.simpan',['kos'=>$kos->id, 'kamar'=>$kamar->id])}}" method="post">
                    {{csrf_field()}}
                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                    <input type="hidden" name="kos_id" value="{{$kos->id}}">
                    <input type="hidden" name="kamar_id" value="{{$kamar->id}}">
                    <div class="form-group">
                      <label>Nama Lengkap</label>
                      <input type="text" name="name" value="{{Auth::user()->name}}" required readonly class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Nama Kos</label>
                      <input type="text" name="namakos" value="{{$kos->judul}}" required readonly class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Nomor Kamar Kos</label>
                      <input type="number" name="nomorkamar" value="{{$kamar->nomorkamar}}" required readonly class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Nomor HP</label>
                      <input type="text" name="nomorhp" required class="form-control">
                    </div>
                    <input type="submit" name="submit" value="Pesan Kamar Kos" class="btn btn-success">
                  </form>
              </div>
            </div>
          </div>
        </div>
      @endsection
