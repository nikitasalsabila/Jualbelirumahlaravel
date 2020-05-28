@extends('depan.partials.layout')
@section('content')
<div class="site-wrap js-site-wrap">
  <!-- BEGIN BREADCRUMBS-->
  <nav class="breadcrumbs">
    <div class="container">
      <ul>
        <li class="breadcrumbs__item"><a href="" class="breadcrumbs__link">Home</a></li>
        <li class="breadcrumbs__item"><a href="" class="breadcrumbs__link">Faq</a></li>
      </ul>
    </div>
  </nav>
  <!-- END BREADCRUMBS-->
  <div class="center">
    <div class="container">
      <div class="row">
        <!-- BEGIN site-->
        <div class="site site--main">
          <header class="site__header">
            <h1 class="site__title">Kontak</h1>
            <h2 class="site__headline">Tentang Orumah.com</h2>
          </header>
          <div class="site__panel"><span class="site__header-text">Orumah.com adalah website yang berfungsi sebagai media pemasaran Rumah untuk daerah Karawang dan sekitarnya.</span></div>


          <header class="site__header">
            <h1 class="site__title">Faq</h1>
            <h2 class="site__headline">Daftar pertanyaan yang sering ditanyakan di website Orumah.com</h2>
          </header>
          <div class="site__panel"><span class="site__header-text">Ini adalah daftar pertanyaan yang sering ditanyakan di Website Carikos.com, untuk pertanyaan atau informasi lebih lanjut anda dapat menghubungi support center kami melalui form dibawah.</span></div>
          <div class="site__main">
            <div class="widget js-widget widget--main">
              <div class="widget__content">
                <!-- BEGIN FAQ-->
                <div role="tablist" aria-multiselectable="true" class="faq">
                  <dl class="faq__item">
                    <dt id="heading-4" role="tab" class="faq__title"><a data-toggle="collapse" data-parent="#accordion" href="#collapse-4" aria-expanded="true" aria-controls="collapse-4" class="faq__expander collapsed">Bagaimana cara untuk Login / Register ?</a></dt>
                    <dd id="collapse-4" role="tabpanel" aria-labelledby="heading-4" class="faq__content collapse">
                      <div class="faq__body">
                        <p>Anda dapat menekan tombol Masuk / Daftar dibagian atas menu website Carikos.com, setelah menekan tombol Masuk / Daftar anda akan dibawa ke halaman Login / Daftar.</p>
                      </div>
                      <div class="faq__footer"><a data-toggle="collapse" data-parent="#accordion" href="#collapse-4" aria-controls="collapse-4" class="faq__close">Close</a></div>
                    </dd>
                  </dl>
                  <!-- end of block .faq__item-->
                  <dl class="faq__item">
                    <dt id="heading-5" role="tab" class="faq__title"><a data-toggle="collapse" data-parent="#accordion" href="#collapse-5" aria-expanded="true" aria-controls="collapse-5" class="faq__expander collapsed">Bagaiamana cara untuk memasarkan Rumah  saya ?</a></dt>
                    <dd id="collapse-5" role="tabpanel" aria-labelledby="heading-5" class="faq__content collapse">
                      <div class="faq__body">
                        <p>Untuk memasarkan Rumah anda, anda diharuskan untuk memiliki akun dan login terlebih dahulu. Kemudian anda dapat menekan tombol Cari Rumah dan kemudian anda dapat menekan tombol Beli rumah, pastikan anda mengisi seluruh Form Tambah Kontrakan dengan benar. Permintaan pembelian Rumah anda akan segera diproses oleh Admin.</p>
                      </div>
                      <div class="faq__footer"><a data-toggle="collapse" data-parent="#accordion" href="#collapse-5" aria-controls="collapse-5" class="faq__close">Close</a></div>
                    </dd>
                  </dl>
                  <!-- end of block .faq__item-->
                  <dl class="faq__item">
                    <dt id="heading-6" role="tab" class="faq__title"><a data-toggle="collapse" data-parent="#accordion" href="#collapse-6" aria-expanded="true" aria-controls="collapse-6" class="faq__expander collapsed">Bagaimana cara untuk memasarkan Rumah saya ?</a></dt>
                    <dd id="collapse-6" role="tabpanel" aria-labelledby="heading-6" class="faq__content collapse">
                      <div class="faq__body">
                        <p>Untuk memasarkan Rumah , anda diharuskan untuk memiliki akun dan login terlebih dahulu. Kemudian anda dapat menekan tombol Cari Rumah dan kemudian anda dapat menekan tombol TambahRumah, pastikan anda mengisi seluruh Form Tambah Rumah dengan benar. Permintaan pembelian Rumah  anda akan segera diproses oleh Admin.</p>
                      </div>
                      <div class="faq__footer"><a data-toggle="collapse" data-parent="#accordion" href="#collapse-6" aria-controls="collapse-6" class="faq__close">Close</a></div>
                    </dd>
                  </dl>
                  <!-- end of block .faq__item-->
                </div>
                <!-- END FAQ-->
              </div>
            </div>
          </div>
        </div>
        <!-- END site-->
        <!-- BEGIN SIDEBAR-->
        <div class="sidebar">
          <div class="widget js-widget widget--sidebar widget--dark">
            <div class="widget__header">
              <h2 class="widget__title">Rumah Dijual Terbaru</h2>
            </div>
            <div class="widget__content">
              @foreach($kontrakans as $kontrakan)
              <div class="listing listing--sidebar">
                <div class="listing__item">
                  <div class="properties properties--sidebar">
                    <div class="properties__thumb"><a href="{{ route('kontrakan.show',['kontrakan'=> $kontrakan->id])}}" class="item-photo item-photo--static"><img src="{{asset('uploads/foto')}}/{{$kontrakan->foto}}" alt=""/>
                        <figure class="item-photo__hover"><span class="item-photo__more">View Details</span></figure></a>
                    </div>
                    <!-- end of block .properties__thumb-->
                    <div class="properties__details">
                      <div class="properties__info"><a href="{{ route('kontrakan.show',['kontrakan'=> $kontrakan->id])}}" class="properties__address">{{ $kontrakan->judul }}</a>
                        <!--+price-->
                      </div>
                    </div>
                    <!-- end of block .properties__info-->
                  </div>
                  <!-- end of block .properties__item-->
                </div>
              </div>
              @endforeach
              @foreach($koses as $kos)
              <div class="listing listing--sidebar">
                <div class="listing__item">
                  <div class="properties properties--sidebar">
                    <div class="properties__thumb"><a href="{{ route('kontrakan.show',['kontrakan'=> $kos->id])}}" class="item-photo item-photo--static"><img src="{{asset('uploads/foto')}}/{{$kos->foto}}" alt=""/>
                        <figure class="item-photo__hover"><span class="item-photo__more">View Details</span></figure></a>
                    </div>
                    <!-- end of block .properties__thumb-->
                    <div class="properties__details">
                      <div class="properties__info"><a href="{{ route('kontrakan.show',['kontrakan'=> $kos->id])}}" class="properties__address">{{ $kos->judul }}</a>
                        <!--+price-->
                      </div>
                    </div>
                    <!-- end of block .properties__info-->
                  </div>
                  <!-- end of block .properties__item-->
                </div>
              </div>
              @endforeach
            </div>
          </div>
        </div>
        <!-- END SIDEBAR-->
        <div class="clearfix"></div>
      </div>
    </div>
  </div>
  <!-- END CENTER SECTION-->
  <!-- BEGIN AFTER CENTER SECTION-->
  <!-- END AFTER CENTER SECTION-->

@endsection
