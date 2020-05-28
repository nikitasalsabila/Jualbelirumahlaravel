@extends('depan.partials.layout')
@section('content')
  <style media="screen">
      .panel{
      width: 80%;
      border: 1px #A0A0A0 solid;
      margin: 0 auto;
    }

    .icon{
      height: 70px;
      padding-top:23px;

    }
    #contact{
      width: 50px;
      height: 50px;
      margin:auto;
      padding:7px 8px 7px 8px;
      background-color :#A4A4A4;
      border-radius: 25px 25px 25px 25px;
    }

    .glyphicon-info-sign, .glyphicon-chevron-left{
      font-size: 25px;
      color: #37A7FD;
    }
    .glyphicon-user{
      font-size: 35px;
      color: #FFFFFF;
    }

    .panel-body{
    height :350px;
    overflow-y: scroll;
    }

    .date{
      color: #A4A4A4;
      text-align: center;
      margin-bottom: 5px;
    }

    .bold{
      font-weight: bold;
    }


    .message{
      font-size: 1.2em;
      width: auto;
      max-width:300px;
      border-radius: 15px;
      padding: 10px;
      margin-bottom: 10px;
    }
    .message-in {
      background-color: #E5E5EA;
      margin-left: 20px;

    }
    .message-out{
      background-color : #22D351;
      margin-right: 20px;
      color: #FFFFFF;
    }

    .glyphicon-send, .glyphicon-camera{
      color: #848484;
    }
  </style>
  <br>
    <div class="container">
      <div class="panel panel-default">
          <div class="panel-heading text-center">
              <div class="row">
                  <div class="col-md-2">
                      <div class="icon"><span class="glyphicon glyphicon-chevron-left"></span></div>
                  </div>
                  <div class="col-md-offset-3 col-md-2">
                    <img src="{{asset('uploads/user')}}/{{$penerima->avatar}}" width="50" class="img-circle">
                    <br>
                    {{$penerima->name}}
                  </div>
                  <div class="col-md-offset-3 col-md-2">
                      <div class="icon"><span class="glyphicon glyphicon-info-sign"></span></div>
                  </div>
              </div>
          </div>
          <div class="panel-body">
            @foreach ($pesans as $pesan)
              @if ($pesan->sender_id == Auth::user()->id)
                <div class="row">
                  <div class="message message-out pull-right">
                    {{$pesan->isi}}
                  </div>
                </div>
              @else
                <div class="row">
                  <div class="message message-in pull-left">
                    {{$pesan->isi}}
                  </div>
                </div>
              @endif
            @endforeach
          </div>
          <div class="panel-footer">
              <form action="{{route('depan.pm.store',['sender_id'=>$pengirim->id, 'receiver_id'=>$penerima->id])}}" method="post">
                  {{csrf_field()}}

                  @if ($pengirim->id == Auth::user()->id)
                    <input type="hidden" name="sender_id" value="{{$pengirim->id}}">
                    <input type="hidden" name="receiver_id" value="{{$penerima->id}}">
                  @else
                    <input type="hidden" name="sender_id" value="{{$penerima->id}}">
                    <input type="hidden" name="receiver_id" value="{{$pengirim->id}}">
                  @endif

                  <div class="input-group">
                    <input id="message-text" name="isi" type="text" class="form-control" placeholder="Isi Pesan">
                    <span class="input-group-btn">
                      <button id="envoi" class="btn btn-default" type="submit"><span class="glyphicon glyphicon-send"></span></button>
                    </span>
                  </div>
              </form>
          </div>
      </div>
  </div>
  <br><br>
@endsection
