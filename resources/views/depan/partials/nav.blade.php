<header class="header header--brand">
  <div class="container">
    <div class="header__row"><a href="index.html" class="header__logo">
        <svg>
          <use xlink:href="#icon-logo--mob"></use>
        </svg></a>
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
                       
                        <li><a href="{{route('depan.profil.pemesanankontrakan',['id'=>Auth::user()->id])}}">List Pembelian Rumah</a></li>
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
    <div class="navbar__row js-navbar-row"><a href="/" class="navbar__brand">
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
