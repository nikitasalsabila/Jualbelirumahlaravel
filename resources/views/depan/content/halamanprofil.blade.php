@extends('depan.partials.layout')
@section('content')
<style media="screen">
@import url(//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css);
/*Baru*/
.fa, .star {
  display: inline-block;
  font: normal normal normal 14px/1 FontAwesome;
  font-size: inherit;
  text-rendering: auto;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
}

.fa, .staruser {
  display: inline-block;
  font: normal normal normal 14px/1 FontAwesome;
  font-size: 30px;
  text-rendering: auto;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
}



.fa-star:before, .rating[data-rating="1"] .star:first-child:before, .rating[data-rating="2"] .star:nth-child(1):before, .rating[data-rating="2"] .star:nth-child(2):before, .rating[data-rating="3"] .star:nth-child(1):before, .rating[data-rating="3"] .star:nth-child(2):before, .rating[data-rating="3"] .star:nth-child(3):before, .rating[data-rating="4"] .star:before, .rating[data-rating="5"] .star:before {
  content: "\f005";
}

.fa-star-o:before, .star:before, .rating[data-rating="4"] .star:last-child:before {
  content: "\f006";
}

.fa-star-half:before {
  content: "\f089";
}

div.stars {
  width: 270px;
  /*display: inline-block;*/
}

input.star { display: none; }

label.star {
  float: right;
  padding: 10px;
  font-size: 36px;
  color: #444;
  transition: all .2s;
}

input.star:checked ~ label.star:before {
  content: '\f005';
  color: #FD4;
  transition: all .25s;
}

input.star-5:checked ~ label.star:before {
  color: #FE7;
  text-shadow: 0 0 20px #952;
}

input.star-1:checked ~ label.star:before { color: #F62; }

label.star:hover { transform: rotate(-15deg) scale(1.3); }

label.star:before {
  content: '\f006';
  font-family: FontAwesome;
}

#leftPanel{
  background-color:#0079ac;
  color:#fff;
  text-align: center;
}

#rightPanel{
  min-height:415px;
}

/* Credit to bootsnipp.com for the css for the color graph */
.colorgraph {
height: 5px;
border-top: 0;
background: #c4e17f;
border-radius: 5px;
background-image: -webkit-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
background-image: -moz-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
background-image: -o-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
background-image: linear-gradient(to right, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
}
.animated {
   -webkit-transition: height 0.2s;
   -moz-transition: height 0.2s;
   transition: height 0.2s;
}

.stars
{
   font-size: 24px;
   color: #d17581;
}
</style>
<div class="container">
<br>
<br>
<div class="row" id="main">
      <div class="col-md-4 well" id="leftPanel">
          <div class="row">
              <div class="col-md-12">
                <div>
              <img src="{{ asset('uploads/user') }}/{{ $user->avatar }}" alt="Texto Alternativo" class="img-circle img-thumbnail" width="200">
              <br><br>
              <div class="rating" data-rating="{{$ratinguser}}">
                  <div class="star staruser"></div>
                  <div class="star staruser"></div>
                  <div class="star staruser"></div>
                  <div class="star staruser"></div>
                  <div class="star staruser"></div>
              </div>
              <h2>Nama : {{$user->name}}</h2>
              <h4>Email : {{$user->email}}</h4>
              <h4>No Handphone : {{$user->no_hp}}</h4>
              <h4>No Ktp : {{$user->no_ktp}}</h4>
              <h4>Alamat : {{$user->alamat}}</h4>
                </div>
          </div>
          </div>
      </div>

      @if(Auth::user()->id == $user->id)
      <div class="col-md-8 well" id="rightPanel">
          <div class="row">
  <div class="col-md-12">
    <h2>Ubah Profil Anda</h2>
    <hr class="colorgraph">
    <div class="row">
    <form action="{{ route('depan.profil.ubahprofil',['id'=>$user->id])}}" method="post" enctype="multipart/form-data">
      {{csrf_field()}}
      <input type="hidden" name="_method" value="PUT">
    <div class="form-group">
      <input type="text" name="name" class="form-control input-lg" placeholder="Nama Lengkap" tabindex="4" value="{{$user->name}}" disabled>
    </div>
    <div class="form-group">
      <input type="email" name="email" class="form-control input-lg" placeholder="Alamat Email" tabindex="4" value="{{$user->email}}" required>
    </div>
    <div class="row">
      <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group">
          <input type="password" id="password" name="password" class="form-control input-lg" placeholder="Password" tabindex="5" required onchange="form.password_confirmation.pattern = this.value;">
        </div>
      </div>
      <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group">
          <input type="password" id="password_confirmation" name="password_confirmation" class="form-control input-lg" placeholder="Konfirmasi Password" tabindex="6" required>
        </div>
      </div>
    </div>
    <div class="form-group">
      <input type="text" name="alamat" class="form-control input-lg" placeholder="Alamat lengkap" tabindex="4" value="{{$user->alamat}}" required>
    </div>
    <div class="form-group">
      <input type="text" name="no_hp" class="form-control input-lg" placeholder="Nomor Handphone" tabindex="4" value="{{$user->no_hp}}" required>
    </div>
    <div class="form-group">
      <input type="text" name="no_ktp" class="form-control input-lg" placeholder="Nomor KTP" tabindex="4" value="{{$user->no_ktp}}" required>
    </div>
    <div class="form-group">
      <label>Foto Profil :</label>
      <input type="file" name="avatar" class="form-control input-lg" tabindex="4">
    </div>
    <hr class="colorgraph">
    <div class="row">
      <div class="col-xs-12 col-md-6"></div>
      <div class="col-xs-12 col-md-6">
        <input type="submit" name="submit" value="Simpan" class="btn btn-lg btn-block btn-success">
      </div>
    </div>
  </form>
</div>
</div>
<!-- Modal -->
<div class="modal fade" id="t_and_c_m" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      <h4 class="modal-title" id="myModalLabel">Terms & Conditions</h4>
    </div>
    <div class="modal-body">
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-primary" data-dismiss="modal">I Agree</button>
    </div>
  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</div>
@endif
@if (Auth::user()->id != $user->id)
  <div class="row">
    <div class="col-md-5">
    </div>
    <div class="col-md-7">
      {{--  Show Komentar --}}
      <h1>Review Pelanggan</h1>
      @foreach ($komentars as $komentar)
        <div class="well well-sm">
          <div class="row">
            <div class="col-md-2">
              <img style="margin-top:20px; margin-left:10px;" class="img-circle" src="{{asset('uploads/user')}}/{{$komentar->getFotoPengirim()}}" width="80">
            </div>
            <div class="col-md-10">
              <h3>{{$komentar->getNamaPengirim()}}</h3>
              <div class="rating" data-rating="{{$komentar->getRating()}}">
                <div class="star"></div>
                <div class="star"></div>
                <div class="star"></div>
                <div class="star"></div>
                <div class="star"></div>
              </div>
              <br>
              <p>{{$komentar->isi}}</p>
            </div>
          </div>
        </div>
      @endforeach
    	<div class="well well-sm">
            <div class="text-right">
                <a class="btn btn-success btn-green" href="#reviews-anchor" id="open-review-box">Leave a Review</a>
            </div>

            <div class="row" id="post-review-box" style="display:none;">
                <div class="col-md-12">
                    <form action="{{route('depan.profil.tambahkomentar',['id'=>$user->id])}}" method="post">
                      {{csrf_field()}}
                        <input id="ratings-hidden" name="rating" type="hidden">
                        <textarea class="form-control animated" cols="50" id="new-review" name="isi" placeholder="Enter your review here..." rows="5"></textarea>

                        <div class="text-right">
                          <div class="stars pull-right clearfix">
                              <input class="star star-5" id="star-5" type="radio" name="star" value="5"/>
                              <label class="star star-5" for="star-5"></label>
                              <input class="star star-4" id="star-4" type="radio" name="star" value="4"/>
                              <label class="star star-4" for="star-4"></label>
                              <input class="star star-3" id="star-3" type="radio" name="star" value="3"/>
                              <label class="star star-3" for="star-3"></label>
                              <input class="star star-2" id="star-2" type="radio" name="star" value="2"/>
                              <label class="star star-2" for="star-2"></label>
                              <input class="star star-1" id="star-1" type="radio" name="star" value="1"/>
                              <label class="star star-1" for="star-1"></label>
                            </div>
                            <br><br><br><br><br>
                            <a class="btn btn-danger btn-lg" href="#" id="close-review-box" style="display:none; margin-right: 10px;">
                            <span class="glyphicon glyphicon-remove"></span>Cancel</a>
                            <button class="btn btn-success btn-lg" type="submit">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

		</div>
	</div>
@endif
      </div>
   </div>
</div>
<script type="text/javascript">
$('#password_confirmation').change(function(){
      if($("#password").val() == $("#password_confirmation").val()){
            /* they match */
      }else{
        alert('asdasd');
            /* they are different */
      }
 });
</script>
@endsection
