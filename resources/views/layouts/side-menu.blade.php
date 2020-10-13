<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ asset('adminlte/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">SSCIntersolusi</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('adminlte/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="{{ asset('profil/') }}" class="{{ Request::path() == 'profil' ? 'alert-primary rounded p-2' : '' }}">{{  Auth::user()->name }} </a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{ url('dashboard/') }}" class="nav-link {{ Request::path() == 'dashboard' ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          @if(Auth::user()->role=='admin')
          <li class="nav-item">
            <a href="{{ url('tryout/') }}" class="nav-link {{ Request::path() == 'tryout' || Request::is('tryout/*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Tryout
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('hasiltryout/') }}" class="nav-link {{ Request::path() == 'hasiltryout' || Request::is('hasiltryout/*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-bullhorn"></i>
              <p>
                Hasil Tryout
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('user/') }}" class="nav-link {{ Request::path() == 'user' || Request::is('user/*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-user"></i>
              <p>
                User
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('universitas/') }}" class="nav-link {{ Request::path() == 'universitas' || Request::is('universitas/*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-university"></i>
              <p>
                Universitas
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('cluster/') }}" class="nav-link {{ Request::path() == 'cluster' || Request::is('cluster/*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-copyright"></i>
              <p>
                Cluster
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('programstudi/') }}" class="nav-link {{ Request::path() == 'programstudi' || Request::is('programstudi/*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Program Studi
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('jurusan/') }}" class="nav-link {{ Request::path() == 'jurusan' || Request::is('jurusan/*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-graduation-cap"></i>
              <p>
                Jurusan
              </p>
            </a>
          </li>
          @endif
          @if(Auth::user()->role=='siswapremium')
          <li class="nav-item">
            <a href="{{ url('hasiltryoutsiswa/') }}" class="nav-link {{ Request::path() == 'hasiltryoutsiswa' || Request::is('hasiltryoutsiswa/*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-clipboard"></i>
              <p>
                Hasil Tryout Saya
              </p>
            </a>
          </li>
          @endif
          @if(Auth::user()->role=='siswapremium' || Auth::user()->role=='siswabiasa')
          <li class="nav-item">
            <a href="{{ url('simulasi/') }}" class="nav-link {{ Request::path() == 'simulasi' || Request::is('simulasi/*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-calculator"></i>
              <p>
                Simulasi Hitung UTBK
              </p>
            </a>
          </li>
          @endif
          @if(Auth::user()->role=='siswabiasa')
          <li class="nav-item">
            <a href="{{ url('upgrade/') }}" class="nav-link {{ Request::path() == 'upgrade' || Request::is('upgrade/*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-star"></i>
              <p>
                Upgrade Premium
              </p>
            </a>
          </li>
          @endif
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>