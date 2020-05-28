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
                <h1 class="text-center">Riwayat Pembelian Rumah</h1>
                <br>
                <table class="table">
                  <thead>
                    <tr>
                      <th>Nama Rumah</th>
                      <th>Alamat Rumah</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($riwayatkontrakan as $riwayat)
                      <tr>
                        <td>{{$riwayat->getNamaKontrakan()}}</td>
                        <td>{{$riwayat->getAlamatKontrakan()}}</td>
                        @if ($riwayat->status == 0)
                          <td>Belum Diterima</td>
                        @else
                          <td>Diterima</td>
                        @endif
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      @endsection
