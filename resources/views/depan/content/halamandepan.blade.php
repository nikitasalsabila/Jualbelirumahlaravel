<!DOCTYPE html>
<html>
  <head lang="en">
    <meta charset="UTF-8">
    <title>Orumah.com</title><!--[if IE]>
    <meta http-equiv="X-UA-Compatible" content="IE=9,chrome=1"><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0, shrink-to-fit=no">
    <meta name="format-detection" content="telephone=no">
    <!-- Loading Source Sans Pro font that is used in this theme-->
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700%7cSource+Sans+Pro:200,400,600,700,900,400italic,700italic&amp;subset=latin,latin-ext" rel="stylesheet" type="text/css">
    <!-- Boostrap and other lib styles-->
    <!-- build:cssvendor-->
    <link rel="stylesheet" href="assets/css/vendor.css">
    <!-- endbuild-->
    <!-- Font-awesome lib-->
    <!-- build:cssfontawesome-->
    <link rel="stylesheet" href="assets/css/font-awesome.css">
    <!-- endbuild-->
    <!-- Theme styles, please replace "default" with other color scheme from the list available in template/css-->
    <!-- build:csstheme-default-->
    <link rel="stylesheet" href="assets/css/theme-default.css">
    <!-- endbuild-->
    <!-- Your styles should go in this file-->
    <link rel="stylesheet" href="assets/css/custom.css">
    <!-- Fixes for IE-->
    <!--[if lt IE 11]>
    <link rel="stylesheet" href="assets/css/ie-fix.css"><![endif]-->
    <link rel="icon" href="assets/img/favicon.ico" type="image/x-icon">
  </head>
  <body class="index menu-default hover-default scroll-animation">
    <!--
    SVG icons from sprite-inline.svg
    They are inlined in order to make them work,
    when the template is opened directly, without
    web-server

    If you are loading theme files using a webserver,
    you can remove this code and set loadSvgWithAjax: true
    at the beginning of the file.

    Or you can use sprite.svg directly.
    All you need to do is to add "img/sprite.svg" before the icon name
    and connect svg4everybody (https://github.com/jonathantneal/svg4everybody) plugin for IE support

    For example:
    <use xlink:href="#icon-area"></use>
    becomes
    <use xlink:href="img/sprite.svg#icon-area"></use>

    --><!-- inject:svg -->
    
    <!-- endinject -->
    <div class="box js-box">
      <!-- BEGIN HEADER-->
      <header class="header header--brand">
        <div class="container">
          <div class="header__row"><a href="/" class="header__logo">
             <!--  <svg>
                <use xlink:href="#icon-logo--mob"></use>
              </svg></a> -->
            <div class="header__settings">
              <!-- end of block .header__settings-column-->
              <div class="header__settings-column">
                <div class="dropdown dropdown--header">
                  <div class="dropdown__menu">
                    <ul>
                      <li class="dropdown__item"><a href="#" class="dropdown__link">Francais</a></li>
                      <li class="dropdown__item"><a href="#" class="dropdown__link">Italian</a></li>
                      <li class="dropdown__item"><a href="#" class="dropdown__link">Russian</a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <!-- end of block .header__contacts-->
            <div class="header__social">
              <div class="social social--header social--circles"><a href="#" class="social__item"><i class="fa fa-facebook"></i></a><a href="#" class="social__item"><i class="fa fa-twitter"></i></a><a href="#" class="social__item"><i class="fa fa-google-plus"></i></a></div>
            </div>
            <div class="auth auth--header">
              <ul class="auth__nav">
                <!-- Authentication Links -->
                @if (Auth::guest())
                  <li class="dropdown auth__nav-item">
                    <button type="button" class="auth__nav-btn">
                      <svg class="auth__icon-user">
                        <use xlink:href="#icon-user"></use>
                      </svg><span class="header__span"> <a href="/login" style="color:white;">Masuk</a> /</span>
                    </button>
                  </li>
                  <li class="dropdown auth__nav-item">
                    <button type="button" class="auth__nav-btn"><span class="header__span">  <a href="/register" style="color:white;">Daftar</a></span></button>
                  </li>
                @else
                    @if (Auth::user())
                      <li class="dropdown" style="margin-right:30px;">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style="color:white;">
                              {{ Auth::user()->name }} <span class="caret"></span>
                          </a>

                          <ul class="dropdown-menu" role="menu">
                              <li><a href="{{route('depan.profil',['id'=>Auth::user()->id])}}">Halaman Profile</a></li>
                              
                              <li><a href="{{route('depan.profil.pemesanankontrakan',['id'=>Auth::user()->id])}}">List Pembelian Rumah  </a></li>
                              <li><a href="{{route('depan.profil.riwayatpemesanan',['id'=>Auth::user()->id])}}">Riwayat</a></li>
                              <li>
                                  <a href="{{ route('logout') }}"
                                      onclick="event.preventDefault();
                                               document.getElementById('logout-form').submit();">
                                      Logout
                                  </a>

                                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                      {{ csrf_field() }}
                                  </form>
                              </li>
                          </ul>
                      </li>
                    @else
                      <li class="dropdown" style="margin-right:30px;">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style="color:white;">
                              {{ Auth::user()->name }} <span class="caret"></span>
                          </a>

                          <ul class="dropdown-menu" role="menu">
                              <li><a href="/admin">Halaman Admin</a></li>
                              <li><a href="/profile">Halaman Profile</a></li>
                              <li>
                                  <a href="{{ route('logout') }}"
                                      onclick="event.preventDefault();
                                               document.getElementById('logout-form').submit();">
                                      Logout
                                  </a>

                                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                      {{ csrf_field() }}
                                  </form>
                              </li>
                          </ul>
                      </li>
                    @endif
                @endif
          </div>
        </div>
      </header>

      <!-- BEGIN NAVBAR-->
      <div id="header-nav-offset"></div>
      <nav id="header-nav" class="navbar navbar--header">
        <div class="container">
          <div class="navbar__row js-navbar-row"><a href="index.html" class="navbar__brand">
              <svg class="navbar__brand-logo">
                <use xlink:href="#icon-logo"></use>
              </svg></a>
            <div id="navbar-collapse-1" class="navbar__wrap">
              <ul class="navbar__nav">
                <li class="navbar__item"><a href="/" class="navbar__link">Beranda</a></li>
                <li class="navbar__item"><a href="/kontrakan" class="navbar__link">Cari Rumah DiJual</a></li>
                
                <li class="navbar__item"><a href="/pengaduan" class="navbar__link">Pengaduan</a></li>
                <li class="navbar__item"><a href="/kontak" class="navbar__link">Kontak</a></li>
              </ul>
              <!-- end of block  navbar__nav-->
            </div>
          </div>
        </div>
      </nav>
      <!-- END NAVBAR-->
      <div class="site-wrap js-site-wrap">
        <div class="widget js-widget">
          <div class="widget__content">
            <div class="banner js-banner banner--wide">
              <div style="background-image: url(&quot;assets/img/banner1.jpg&quot;);" class="banner__item">
                <div class="map map--index map--banner">
                  <div class="map__buttons">
                    <button type="button" class="map__change-map js-map-btn">Property Map</button>
                  </div>
                  <div class="map__wrap">
                    <div data-infobox-theme="white" class="map__view js-map-index-canvas"></div>
                  </div>
                </div>
                <div class="container">
                  <div class="row">
                    <div class="banner__caption">
                      <h1 class="banner__title">The Best Way to Find Your Perfect Home</h1>
                      <h3 class="banner__subtitle">Temukanlah Rumah Impian Anda yang sesuai dengan selera anda.</h3><span class="banner__btn">Ayoo Cari !!!</span>
                      <div class="banner__arrow-circle">•</div>
                      <svg class="banner__arrow-end js-arrow-end">
                        <use xlink:href="#icon-arrow-end"></use>
                      </svg>
                      <div class="banner__arrow">
                        <svg id="banner-line" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                          viewBox="0 0 774 284" enable-background="new 0 0 774 284" xml:space="preserve">
                          <path  fill="none" stroke-width="2" stroke-miterlimit="10" stroke-dasharray="0,2004.009" d="M220.6,239.6
                          c-3.6-15.5-17.5-27.1-34.1-27.1h-150c-19.3,0-35,15.7-35,35c0,19.3,15.7,35,35,35c0,0,88,0,150,0c169,0,244.9-7.5,291-19
                          c41.3-10.2,114.1-33.7,118-83c4.2-53.5-59.4-67.5-102-54c-47.2,15-52.3,78.2,1,90c58.1,12.9,169.6-53.6,274.7-210"/>
                        </svg>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="widget js-widget widget--landing widget--gray">
          <div class="widget__header">
            <h2 class="widget__title">Daftar Rumah DiJual</h2>
            <h5 class="widget__headline">Daftar Rumah DiJual yang ada di Karawang dan sekitarnya</h5>
          </div>
          <div class="widget__content">
            <!-- BEGIN PROPERTIES INDEX-->
            <div class="tab tab--properties">
              <!-- Nav tabs-->
              <ul role="tablist" class="nav tab__nav">
                <li class="active"><a href="#tab-popular" aria-controls="tab-popular" role="tab" data-toggle="tab" class="properties__btn js-pgroup-tab">Rumah DiJual Terbaru</a></li>
                
              </ul>
              <!-- Tab panes-->
              <div class="tab-content">
                <div id="tab-popular" class="tab-pane in active">
                  <div class="listing listing--grid">
                    @foreach($kontrakanbaru as $kontrakan)
                    <div class="listing__item">
                      <div class="properties properties--grid">
                        <div class="properties__thumb"><a href="{{ route('kontrakan.show',['kontrakan'=> $kontrakan->id])}}" class="item-photo"><img src="uploads/foto/{{$kontrakan->foto}}" alt=""/>
                        </a><span class="properties__ribon">{{$kontrakan->getKecamatan()}}</span>
                        </div>
                        <!-- end of block .properties__thumb-->
                        <div class="properties__details">
                          <div class="properties__info"><a href="{{ route('kontrakan.show',['kontrakan'=> $kontrakan->id])}}" class="properties__address"><span class="properties__address-street">{{$kontrakan->judul}}</span><span class="properties__address-city">{{$kontrakan->alamat}}</span></a>
                            <div class="properties__offer">
                              <div class="properties__offer-column">

                              </div>
                              <div class="properties__offer-column">
                                <div class="properties__offer-value"><strong>Rp. {{$kontrakan->harga}}</strong><span class="properties__offer-period">/unit</span>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- end of block .properties__info-->
                      </div>
                      <!-- end of block .properties__item-->
                    </div>
                    @endforeach
                  </div>
                </div>
                <div id="tab-recent" class="tab-pane">
                  <div class="listing listing--grid">
                    @foreach($kosbaru as $kos)
                    <div class="listing__item">
                      <div class="properties properties--grid">
                        <div class="properties__thumb"><a href="{{ route('rumahkos.show',['kos'=> $kos->id])}}" class="item-photo"><img src="uploads/foto/{{$kos->foto}}" alt=""/>
                        </a><span class="properties__ribon">{{$kos->getKecamatan()}}</span>
                        </div>
                        <!-- end of block .properties__thumb-->
                        <div class="properties__details">
                          <div class="properties__info"><a href="{{ route('rumahkos.show',['kos'=> $kos->id])}}" class="properties__address"><span class="properties__address-street">{{$kos->judul}}</span><span class="properties__address-city">{{$kos->alamat}}</span></a>
                            <div class="properties__offer">
                              <div class="properties__offer-column">

                              </div>
                              <div class="properties__offer-column">
                                <div class="properties__offer-value"><strong>Rp. {{$kos->harga}}</strong><span class="properties__offer-period">/bulan</span>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- end of block .properties__info-->
                      </div>
                      <!-- end of block .properties__item-->
                    </div>
                    @endforeach
                  </div>
                </div>
                <div id="tab-featured" class="tab-pane">
                  <div class="listing listing--grid">
                    <div class="listing__item">
                      <div class="properties properties--grid">
                        <div class="properties__thumb"><a href="property_details.html" class="item-photo"><img src="assets/img/no-image--554x360.jpg" alt=""/>
                            <figure class="item-photo__hover item-photo__hover--params"><span class="properties__params">Built-Up - 85 Sq Ft</span><span class="properties__params">Land Size - 90 Sq Ft</span><span class="properties__intro">I am so VERY wide, but she got to do,' said the Hatter. 'You MUST remember,' remarked the King, '...</span><span class="properties__time">Added date: 10 days ago</span><span class="properties__more">View details</span>
                            </figure></a><span class="properties__ribon">For sale</span>
                        </div>
                        <!-- end of block .properties__thumb-->
                        <div class="properties__details">
                          <div class="properties__info"><a href="property_details.html" class="properties__address"><span class="properties__address-street">514 East Myrtle Street</span><span class="properties__address-city">Santa Ana, CA 92701, USA</span></a>
                            <div class="properties__offer">
                              <div class="properties__offer-column">
                                <div class="properties__offer-label">Commision</div>
                                <div class="properties__offer-value"><strong> 8%</strong>
                                </div>
                              </div>
                              <div class="properties__offer-column">
                                <div class="properties__offer-value"><strong>$79,560</strong>
                                </div>
                              </div>
                            </div>
                            <div class="properties__params--mob"><a href="#" class="properties__more">View details</a><span class="properties__params">Built-Up - 85 Sq Ft</span><span class="properties__params">Land Size - 90 Sq Ft</span></div>
                          </div>
                        </div>
                        <!-- end of block .properties__info-->
                      </div>
                      <!-- end of block .properties__item-->
                    </div>
                    <div class="listing__item">
                      <div class="properties properties--grid">
                        <div class="properties__thumb"><a href="property_details.html" class="item-photo"><img src="assets/media-demo/properties/554x360/06.jpg" alt=""/>
                            <figure class="item-photo__hover item-photo__hover--params"><span class="properties__params">Built-Up - 505 Sq Ft</span><span class="properties__params">Land Size - 1010 Sq Ft</span><span class="properties__intro">I needn't be afraid of them!' 'And who is to France Then turn not pale, beloved snail, but come a...</span><span class="properties__time">Added date: 12 days ago</span><span class="properties__more">View details</span>
                            </figure></a><span class="properties__ribon">For rent</span>
                        </div>
                        <!-- end of block .properties__thumb-->
                        <div class="properties__details">
                          <div class="properties__info"><a href="property_details.html" class="properties__address"><span class="properties__address-street">1230 Martin Luther King</span><span class="properties__address-city">Los Angeles, CA 90037, USA</span></a>
                            <div class="properties__offer">
                              <div class="properties__offer-column">
                                <div class="properties__offer-label">Commision</div>
                                <div class="properties__offer-value"><strong> $550</strong>
                                </div>
                              </div>
                              <div class="properties__offer-column">
                                <div class="properties__offer-value"><strong>$2,255</strong><span class="properties__offer-period">/month</span>
                                </div>
                              </div>
                            </div>
                            <div class="properties__params--mob"><a href="#" class="properties__more">View details</a><span class="properties__params">Built-Up - 505 Sq Ft</span><span class="properties__params">Land Size - 1010 Sq Ft</span></div>
                          </div>
                        </div>
                        <!-- end of block .properties__info-->
                      </div>
                      <!-- end of block .properties__item-->
                    </div>
                    <div class="listing__item">
                      <div class="properties properties--grid">
                        <div class="properties__thumb"><a href="property_details.html" class="item-photo"><img src="assets/media-demo/properties/554x360/07.jpg" alt=""/>
                            <figure class="item-photo__hover item-photo__hover--params"><span class="properties__params">Built-Up - 85 Sq Ft</span><span class="properties__params">Land Size - 153 Sq Ft</span><span class="properties__intro">My home is bright and spacious. Very good transport links. Close to the Olympic village, Westfiel...</span><span class="properties__time">Added date: 15 days ago</span><span class="properties__more">View details</span>
                            </figure></a><span class="properties__ribon">For sale</span>
                        </div>
                        <!-- end of block .properties__thumb-->
                        <div class="properties__details">
                          <div class="properties__info"><a href="property_details.html" class="properties__address"><span class="properties__address-street">401 South Sycamore Street</span><span class="properties__address-city">Santa Ana, CA 92701, USA</span></a>
                            <div class="properties__offer">
                              <div class="properties__offer-column">
                                <div class="properties__offer-label">Commision</div>
                                <div class="properties__offer-value"><strong> $790</strong>
                                </div>
                              </div>
                              <div class="properties__offer-column">
                                <div class="properties__offer-value"><strong>$6,218,780</strong>
                                </div>
                              </div>
                            </div>
                            <div class="properties__params--mob"><a href="#" class="properties__more">View details</a><span class="properties__params">Built-Up - 85 Sq Ft</span><span class="properties__params">Land Size - 153 Sq Ft</span></div>
                          </div>
                        </div>
                        <!-- end of block .properties__info-->
                      </div>
                      <!-- end of block .properties__item-->
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="widget js-widget">
          <div class="widget__content">
            <!-- BEGIN SECTION FEATURE-->
            <section class="feature">
              <div class="feature__picture"></div>
              <!-- end of .feature__picture-->
              <div class="container">
                <div class="feature__content">
                  <div class="feature__header">
                    <h3 data-sr="enter right ease-in-out 150px" class="feature__title">Kelebihan Orumah.com</h3>
                    <br>
                  </div>
                  <!-- end of block .feature__header-->
                  <div class="feature__list">
                    <div data-sr="enter right ease 150px" class="feature__item">
                      <svg class="feature__icon feature__icon--money-save">
                        <use xlink:href="#icon-money-save"></use>
                      </svg>
                      <div class="feature__item-content">
                        <h3 class="feature__item-title">Tanpa Biaya</h3>
                        <div class="feature__text">
                          <p>Anda tidak perlu membayar biaya pemasaran Jual Rumah  yang ingin anda pasarkan.</p>
                        </div>
                      </div>
                    </div>
                    <!-- end of block .feature__item-->
                    <div data-sr="enter right ease 250px" class="feature__item">
                      <svg class="feature__icon feature__icon--good-sales">
                        <use xlink:href="#icon-good-sales"></use>
                      </svg>
                      <div class="feature__item-content">
                        <h3 class="feature__item-title">Kemudahan Pemasaran</h3>
                        <div class="feature__text">
                          <p>Para pemilik Rumah  dapat memasarkan lebih dari 1 Rumah.</p>
                        </div>
                      </div>
                    </div>
                    <!-- end of block .feature__item-->
                    <div data-sr="enter right ease 150px" class="feature__item">
                      <svg class="feature__icon">
                        <use xlink:href="#icon-get--review"></use>
                      </svg>
                      <div class="feature__item-content">
                        <h3 class="feature__item-title">Review Pemilik</h3>
                        <div class="feature__text">
                          <p>Anda dapat memberi penilaian dan review kepada Pemilik, Rumah  yang ditawarkan.</p>
                        </div>
                      </div>
                    </div>
                    <!-- end of block .feature__item-->
                    <div data-sr="enter right ease 250px" class="feature__item">
                      <svg class="feature__icon">
                        <use xlink:href="#icon-easy"></use>
                      </svg>
                      <div class="feature__item-content">
                        <h3 class="feature__item-title">Mempermudah Pencarian</h3>
                        <div class="feature__text">
                          <p>Anda bisa mencari Rumah  dengan sangat mudah. Anda juga bisa mencari Rumah  sesuai dengan Kecamatan.</p>
                        </div>
                      </div>
                    </div>
                    <!-- end of block .feature__item-->
                  </div>
                  <!-- end of block .feature__list-->
                </div>
                <!-- end of .feature__content-->
              </div>
            </section>
            <!-- END SECTION FEATURE-->
          </div>
        </div>
        <div class="widget js-widget widget--landing widget--achievement">
          <div class="widget__content">
            <!-- BEGIN SECTION ACHIEVEMENT-->
            <div class="achievement">
              <div class="container">
                <div class="row">
                  <div data-sr="enter right move 0 over 0 wait 0s" data-animate-callback="countUp" data-animate-end="achievement__item--animate-end" class="achievement__item">
                    <svg class="achievement__icon">
                      <use xlink:href="#icon-transactions"></use>
                    </svg>
                    <div data-count-end="{{$jlhorder}}" data-count-duration="1" class="achievement__counter achievement__counter--lg js-count-up"></div>
                    <div class="achievement__counter">{{$jlhorder}}</div>
                    <div class="achievement__name">Transaksi</div>
                  </div>
                  <div data-sr="enter right move 0 over 0 wait 0.5s" data-animate-callback="countUp" data-animate-end="achievement__item--animate-end" class="achievement__item">
                    <svg class="achievement__icon">
                      <use xlink:href="#icon-customers"></use>
                    </svg>
                    <div data-count-end="{{$jlhuser}}" data-count-duration="1" class="achievement__counter achievement__counter--lg js-count-up"></div>
                    <div class="achievement__counter">{{ $jlhuser }}</div>
                    <div class="achievement__name">Daftar Pengguna</div>
                  </div>
                  
                  <div data-sr="enter right move 0 over 0 wait 1.5s" data-animate-callback="countUp" data-animate-end="achievement__item--animate-end" class="achievement__item">
                    <svg class="achievement__icon">
                      <use xlink:href="#icon-sales"></use>
                    </svg>
                    <div data-count-end="{{ $jlhkontrakan }}" data-count-duration="1" class="achievement__counter achievement__counter--lg js-count-up"></div>
                    <div class="achievement__counter">{{ $jlhkontrakan }}</div>
                    <div class="achievement__name">Rumah DiJual</div>
                  </div>
                </div>
              </div>
            </div>
            <!-- END SECTION ACHIEVEMENT-->
          </div>
        </div>
        <div class="widget js-widget widget--landing">
          <div class="widget__header">
            <h2 class="widget__title">Testimoni</h2>
            <h5 class="widget__headline">Testimoni para Pelanggan dan Pemilik Rumah </h5>
          </div>
          <div class="widget__content">
            <!-- BEGIN SECTION REVIEW-->
            <div id="review-slider" class="review review--wide">
              <div class="review__slider js-slick-slider">
                <div class="review__item">
                  <div class="review__photo"><img src="{{asset('/images/user.jpg')}}" alt="ALT" class="review__photo-img"></div>
                  <div class="review__details"><span class="review__name">User 1</span><span class="review__post">Pelanggan Orumah</span>
                    <div class="review__stars"><i class="glyphicon glyphicon-star"></i><i class="glyphicon glyphicon-star"></i><i class="glyphicon glyphicon-star"></i><i class="glyphicon glyphicon-star"></i><i class="glyphicon glyphicon-star"></i></div>
                  </div>
                  <div class="review__info">
                    <div class="review__info-quote review__info-quote--open">&rdquo;</div>
                    <p>Orumah.com sangat membantu saya dalam membeli rumah.
                    </p>
                    <div class="review__info-quote review__info-quote--close">&ldquo;</div>
                  </div>
                  <div class="clearfix"></div>
                  <!-- end of block .review__item-->
                </div>
                <div class="review__item">
                  <div class="review__photo"><img src="{{asset('/images/user.jpg')}}" alt="ALT" class="review__photo-img"></div>
                  <div class="review__details"><span class="review__name">User 1</span><span class="review__post">Pemilik Rumah</span>
                    <div class="review__stars"><i class="glyphicon glyphicon-star"></i><i class="glyphicon glyphicon-star"></i><i class="glyphicon glyphicon-star"></i><i class="glyphicon glyphicon-star"></i><i class="glyphicon glyphicon-star"></i></div>
                  </div>
                  <div class="review__info">
                    <div class="review__info-quote review__info-quote--open">&rdquo;</div>
                    <p>Orumah.com sangat membantu saya dalam memasarkan Rumah  saya.
                    </p>
                    <div class="review__info-quote review__info-quote--close">&ldquo;</div>
                  </div>
                  <div class="clearfix"></div>
                  <!-- end of block .review__item-->
                </div>
                <<div class="review__item">
                  <div class="review__photo"><img src="{{asset('/images/user.jpg')}}" alt="ALT" class="review__photo-img"></div>
                  <div class="review__details"><span class="review__name">User 1</span><span class="review__post">Pemilik Rumah</span>
                    <div class="review__stars"><i class="glyphicon glyphicon-star"></i><i class="glyphicon glyphicon-star"></i><i class="glyphicon glyphicon-star"></i><i class="glyphicon glyphicon-star"></i><i class="glyphicon glyphicon-star"></i></div>
                  </div>
                  <div class="review__info">
                    <div class="review__info-quote review__info-quote--open">&rdquo;</div>
                    <p>Orumah.com sangat membantu saya dalam memasarkan Rumah  saya.
                    </p>
                    <div class="review__info-quote review__info-quote--close">&ldquo;</div>
                  </div>
                  <div class="clearfix"></div>
                  <!-- end of block .review__item-->
                </div>
              </div>
              <!-- end of block .review__list-->
            </div>
            <!-- END SECTION REVIEW-->
          </div>
        </div>
        <!-- END AFTER CENTER SECTION-->
        <!-- BEGIN FOOTER-->
        <footer class="footer">
          <div class="container">
            <div class="footer__wrap">
              <div class="footer__col footer__col--first">
                <div class="widget js-widget widget--footer">
                  <div class="widget__header">
                    <h2 class="widget__title">About</h2>
                  </div>
                  <div class="widget__content">
                    <aside class="widget_text">
                      <div class="textwidget">
                        Orumah.com adalah sebuah website yang berfungsi sebagai media pemasaran Rumah dijual yang ada di wilayah Karawang dan sekitarnya.
                        <br>
                        <p><a href="/kontak">Selengkapnya...</a></p>
                      </div>

                    </aside>
                  </div>
                </div>
              </div>
              <!-- end of block .footer__col-first-->
              <div class="footer__col footer__col--second">
                <div class="widget js-widget widget--footer">
                  <div class="widget__header">
                    <h2 class="widget__title">Contact</h2>
                  </div>
                  <div class="widget__content">
                    <section class="address address--footer">
                      <h4 class="address__headline">Kantor kami</h4>
                      <address class="address__main"><span>Jalan Rongowaluyo</span><span>Karawang Barat, Kota Karawang</span><a href="#">hello@orumah.com</a></address>
                    </section>
                    <!-- end of block .address-->
                  </div>
                </div>
              </div>
              <!--end of block .footer__col-second-->
              <div class="footer__col footer__col--third">
                <div class="widget js-widget widget--footer">
                  <div class="widget__content">
                    <div class="listing listing--footer">
                    </div>
                    <h2 class="widget-title">Daftar atau Masuk</h2>
                    <h4 class="address__headline">Daftar atau Masuk untuk mulai melakukan pencarian Rumah</h4>
                    <a href="/login" class="widget__more"> Masuk</a>
                    <a href="/register" class="widget__more"> Daftar</a>
                  </div>
                </div>
              </div>
              <!-- end of block .footer__col-third-->
              <div class="clearfix"></div><span class="footer__copyright">&copy; 2020 Orumah.com. Powered By Laravel and Created By Fitra Pamungkas and Nikita Salsabila</span>
              <!-- end of block .footer__copyright-->
            </div>
          </div>
        </footer>

        <!-- end of block .footer-->
        <!-- END FOOTER-->
      </div>
    </div>
    {{-- <button type="button" class="scrollup js-scrollup"></button> --}}
    <!-- end of block .scrollup-->
    <!-- BEGIN SCRIPTS and INCLUDES-->
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?libraries=places,drawing,geometry"></script>
    <script type="text/javascript" src="http://cdn.ckeditor.com/4.5.6/standard/ckeditor.js"></script>
    <!--
    Contains vendor libraries (Bootstrap3, Jquery, Chosen, etc) already compiled into a single file, with
    versions that are verified to work with our theme. Normally, you should not edit that file.
    -->
    <!-- build:jsvendor-->
    <script type="text/javascript" src="assets/js/vendor.js"></script>
    <!-- endbuild-->
    <!--
    This file is used for demonstration purposes and contains example property items, that are mostly used to
    render markers on the map. You can safely delete this file, after you've adapted the demo.js code
    to use your own data.
    -->
    <!-- build:jsdemodata-->
    {{-- <script type="text/javascript" src="assets/js/demodata.js"></script> --}}
    <!-- endbuild-->
    <!--
    The library code that Realtyspace theme relies on, in order to function properly.
    Normally, you should not edit this file or add your own code there.
    -->
    <!-- build:jsapp-->
    <script type="text/javascript" src="assets/js/app.js"></script>
    <!-- endbuild-->
    <!--
    the main file, that you should modify. It contains lots of examples of
    plugin usage, with detailed comments about specific sections of the code.
    -->
    <!-- build:jsdemo-->
    <script type="text/javascript" src="assets/js/demo.js"></script>
    <!-- endbuild--><!-- inject:ga  -->
    <!-- endinject -->
    <!-- END SCRIPTS and INCLUDES-->
  </body>
</html>
