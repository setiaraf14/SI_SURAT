<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <span class="brand-text font-weight-light">{{ Auth::user()->role }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image text-center">
          <img src="{{ asset('image/kota-tangerang.png') }}" class="img-circle elevation-2" width="250" alt="User Image">
          <h6 style="color: white" class="m-2">DISPORA KOTA TRANGERANG</h6>
        </div>
        <div class="info">
          <a href="#" class="d-block"></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="{{ url('/admin') }}" class="nav-link @yield('dashboard') ">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview menu-open">
            <a href="{{ url('/admin/surat-masuk') }}" class="nav-link @yield('Surat-Masuk') ">
              <i class="nav-icon fas fa-id-card"></i>
              <p>
                Surat Masuk
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview menu-open">
            <a href="{{ url('/admin/surat-keluar') }}" class="nav-link @yield('Surat-Keluar') ">
              <i class="nav-icon fas fa-file-alt"></i>
              <p>
                Surat Keluar
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview menu-open">
            <a href="{{ url('/admin/index-surat') }}" class="nav-link @yield('Index-Surat') ">
              <i class="nav-icon fas fa-file-alt"></i>
              <p>
                Index Akun Surat
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>