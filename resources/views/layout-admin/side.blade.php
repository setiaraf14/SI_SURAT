<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <span class="brand-text font-weight-light">Template Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('admin/dist/img/AdminLTELogo.jpg') }}" class="img-circle elevation-2" alt="User Image">
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
            <a href="#" class="nav-link @yield('dashboard') ">
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
            <a href="#" class="nav-link @yield('example-page') ">
              <i class="nav-icon fas fa-file-alt"></i>
              <p>
                Example Page Content
              </p>
            </a>
          </li>
        {{-- <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link @yield('berita') ">
            <i class="fas fa-newspaper"></i>
            <p>
                Berita Kecamatan
            </p>
            </a>
        </li> --}}
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link"  @yield('user-role')>
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Menu & Sub Menu
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Staff</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kepala Bagian</p>
                </a>
              </li>
              {{-- <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>User</p>
                </a>
              </li> --}}
            </ul>
          </li>
          {{-- <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link @yield('rating') ">
              <i class="nav-icon fas fa-star-half-alt"></i>
              <p>
                Rating
              </p>
            </a>
          </li> --}}
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link">
              <i class="far fa-hand-point-left"></i>
              <p>
                Back To Homepage
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>