@extends('depan.partials.layout')
@section('content')
  <style media="screen">
    #map-canvas {
      width: 100%;
      height: 300px;
      margin-top: 20px;
    }
  </style>
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
                <h1 class="text-center">Edit Rumah</h1>
                <br>
                <form enctype="multipart/form-data" action="{{ route('kontrakan.update',['id'=>$kontrakan->id]) }}" method="post">
                  {{ csrf_field() }}
                  <input type="hidden" name="_method" value="PUT">
                  <div class="form-group">
                    <label for="judul">Nama Rumah</label>
                    <input type="text" name="judul" class="form-control" required="true" value="{{$kontrakan->judul}}">
                  </div>
                  <div class="form-group">
                    <label for="kecamatan">Nama Kecamatan</label>
                    <select class="form-control" name="kecamatan" id="kecamatan" required="true">
                      <option value="">Pilih Kecamatan</option>
                      @foreach ($kecamatans as $kecamatan)
                      <option value="{{ $kecamatan->id }}">{{ $kecamatan->nama_kecamatan }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="isi">Penjelasan Rumah</label>
                    <textarea name="isi" cols="80" class="form-control" required="true">{{$kontrakan->isi}}</textarea>
                  </div>
                  <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" name="alamat" class="form-control" required value="{{$kontrakan->alamat}}">
                  </div>
                  <div class="form-group">
                    <label>Lokasi Pada Google Map</label>
                    <input type="text" name="search" class="form-control" id="searchmap" placeholder="Tuliskan Pencarian Alamat Disini..">
                    <div id="map-canvas"></div>
                    <input type="hidden" name="lat" id="lat">
                    <input type="hidden" name="lng" id="lng">
                  </div>
                  <div class="form-group">
                    <label for="harga">Harga</label>
                    <input type="text" name="harga" class="form-control" required="true" value="{{$kontrakan->harga}}">
                  </div>
                  <div class="form-group">
                    <label for="foto">Upload Foto</label>
                    <input type="file" name="foto" class="form-control" required="true">
                  </div>
                  <div class="form-group">
                    <label for="foto">Luas Area Kontrakan</label>
                    <input type="text" name="luastanah" class="form-control" required="true" value="{{$kontrakan->luastanah}}">
                  </div>
                  <div class="form-group">
                    <label>Apakah Tersedia AC ?</label><br>
                    <label class="radio-inline">
                      <input type="radio" name="ac" value="Ya" required>Ya
                    </label>
                    <label class="radio-inline">
                      <input type="radio" name="ac" value="Tidak" required>Tidak
                    </label>
                  </div>
                  <div class="form-group">
                    <label for="jlhkamarmandi">Jumlah Kamar Mandi</label>
                    <input type="number" name="jlhkamarmandi" class="form-control" required="true" value="{{$kontrakan->jlhkamarmandi}}">
                  </div>
                  <div class="form-group">
                    <label for="jlhkamar">Jumlah Kamar</label>
                    <input type="number" name="jlhkamar" class="form-control" required="true" value="{{$kontrakan->jlhkamar}}">
                  </div>
                  <div class="form-group">
                    <label>Apakah Tersedia Garasi ?</label><br>
                    <label class="radio-inline">
                      <input type="radio" name="garasi" value="Ya" required>Ya
                    </label>
                    <label class="radio-inline">
                      <input type="radio" name="garasi" value="Tidak" required>Tidak
                    </label>
                  </div>
                  <div class="form-group">
                    <input type="submit" name="submit" value="Submit" class="btn btn-primary" onclick="alert();">
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>

      @endsection

      @section('googlescript')
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCyB6K1CFUQ1RwVJ-nyXxd6W0rfiIBe12Q&libraries=places"
      type="text/javascript"></script>
      <script type="text/javascript">
        window.alert = function() {};
      </script>

        <script type="text/javascript">
          var map = new google.maps.Map(document.getElementById('map-canvas'),{
            center:{
              lat: {{$kontrakan->lat}},
              lng: {{$kontrakan->lng}}
            },
            zoom:15
          });

          var marker = new google.maps.Marker({
        		position: {
        			lat: {{$kontrakan->lat}},
              lng: {{$kontrakan->lng}}
        		},
        		map: map,
        		draggable: true
        	});

        	var searchBox = new google.maps.places.SearchBox(document.getElementById('searchmap'));
        	google.maps.event.addListener(searchBox,'places_changed',function(){
        		var places = searchBox.getPlaces();
        		var bounds = new google.maps.LatLngBounds();
        		var i, place;
        		for(i=0; place=places[i];i++){
          			bounds.extend(place.geometry.location);
          			marker.setPosition(place.geometry.location); //set marker position new...
          		}
          		map.fitBounds(bounds);
          		map.setZoom(15);
        	});

        	google.maps.event.addListener(marker,'position_changed',function(){
        		var lat = marker.getPosition().lat();
        		var lng = marker.getPosition().lng();
        		$('#lat').val(lat);
        		$('#lng').val(lng);
        	});
        </script>
      @endsection
