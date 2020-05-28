@extends('belakang.partials.layout')
@section('content')
  <section class="content">
    <div class="container-fluid">
      <!-- Exportable Table -->
      <div class="row clearfix">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <div class="card">
                  <div class="header">
                      <h2>
                          Data Pengaduan Pelanggan
                      </h2>
                      <ul class="header-dropdown m-r--5">
                          <li class="dropdown">
                              <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                  <i class="material-icons">more_vert</i>
                              </a>
                              <ul class="dropdown-menu pull-right">
                                  <li><a href="javascript:void(0);">Action</a></li>
                                  <li><a href="javascript:void(0);">Another action</a></li>
                                  <li><a href="javascript:void(0);">Something else here</a></li>
                              </ul>
                          </li>
                      </ul>
                  </div>
                  <div class="body">
                      <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                          <thead>
                              <tr>
                                  <th>Nama Pengirim</th>
                                  <th>Judul</th>
                                  <th>Isi Pesan</th>
                                  <th>Hapus</th>
                              </tr>
                          </thead>
                          <tbody>
                            @foreach ($pengaduans as $pengaduan)
                              <tr>
                                  <td>{{ $pengaduan->getNama() }}</td>
                                  <td>{{ $pengaduan->judul }}</td>
                                  <td>{{ $pengaduan->isi }}</td>
                                  <td>
                                    <form action="{{route('pengaduans.destroy',['id'=>$pengaduan->id])}}" method="post">
                                      {{csrf_field()}}
                                      <input type="hidden" name="_method" value="DELETE">
                                      <input type="submit" name="submit" value="Hapus" class="btn btn-danger">
                                    </form>
                                  </td>
                              </tr>
                            @endforeach
                          </tbody>
                      </table>
                  </div>
              </div>
          </div>
      </div>
      <!-- #END# Exportable Table -->
    </div>
  </section>
@endsection
