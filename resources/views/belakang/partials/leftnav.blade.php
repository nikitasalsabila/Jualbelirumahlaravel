<aside id="leftsidebar" class="sidebar">
    <!-- User Info -->
    <div class="user-info">
        <div class="image">
            <img src="../../images/user.png" width="48" height="48" alt="User" />
        </div>
        <div class="info-container">
            <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{Auth::guard('admin')->user()->name}}</div>
            <div class="email">{{Auth::guard('admin')->user()->email}}</div>
        </div>
    </div>
    <!-- #User Info -->
    <!-- Menu -->
    <div class="menu">
        <ul class="list">
            <li class="header">MAIN NAVIGATION</li>
            <li class="active">
                <a href="/admin">
                    <i class="material-icons">home</i>
                    <span>Home</span>
                </a>
            </li>
            <li>
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">store_mall_directory</i>
                    <span>Kelola Rumah dijual</span>
                </a>
                <ul class="ml-menu">
                  <li>
                    <a href="/admin/verifikasikontrakan">Verifikasi Rumah DiJual</a>
                  </li>
                  <li>
                    <a href="/admin/datakontrakan">Daftar Rumah diJual</a>
                  </li>
                </ul>
            </li>
            
            <li>
                <a href="/admin/user">
                    <i class="material-icons">people</i>
                    <span>Kelola User</span>
                </a>
            </li>
            <li>
                <a href="/admin/pengaduans">
                    <i class="material-icons">chat</i>
                    <span>Kelola Pengaduan</span>
                </a>
            </li>
            <li>
              <a href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
                  <i class="material-icons">exit_to_app</i>
                  <span>Keluar</span>
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  {{ csrf_field() }}
              </form>
            </li>
        </ul>
    </div>
    <!-- #Menu -->
    <!-- Footer -->
    <div class="legal">
        <div class="copyright">
            &copy; 2020 <a href="javascript:void(0);">AdminPanel - Fitra Pamungkas</a>.
        </div>
        <div class="version">
            <b>Version: </b> 1.0.0
        </div>
    </div>
    <!-- #Footer -->
</aside>
