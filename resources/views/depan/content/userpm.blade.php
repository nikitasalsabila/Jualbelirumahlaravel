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
                  <h1 class="text-center">Daftar Pesan {{Auth::user()->name}}</h1>
                  <br>
                  <div class="row">
                    @foreach ($pesans as $pesan)
                      <div class="well">
                        <div class="row">
                          <div class="col-md-2">
                            <img src="{{asset('uploads/user')}}/{{$pesan->getAvatar()}}" class="img-circle" width="100">
                          </div>
                          <div class="col-md-8">
                            <h2>{{$pesan->getNama()}}</h2>
                            <br>
                            <a href="/pm/{{Auth::user()->id}}/{{$pesan->sender_id}}" class="btn btn-success">Cek Pesan</a>
                          </div>
                        </div>
                      </div>
                    @endforeach
                  </div>
              </div>
            </div>
          </div>
        </div>
      @endsection
