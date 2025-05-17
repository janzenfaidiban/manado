<!-- Sidebar -->
<div class="sidebar" data-background-color="dark">
  <div class="sidebar-logo">
    <!-- Logo Header -->
    <div class="logo-header" data-background-color="dark">
      <a href="{{ route('admin.dasbor') }}" class="logo">
        <img src="{!! asset($siteLogo) ?? '' !!}" alt="navbar brand" class="navbar-brand" height="20" />
        <span class="text-light ps-2">{!! $siteTitle ?? 'site title' !!}</span>
      </a>
      <div class="nav-toggle">
        <button class="btn btn-toggle toggle-sidebar">
          <i class="gg-menu-right"></i>
        </button>
        <button class="btn btn-toggle sidenav-toggler">
          <i class="gg-menu-left"></i>
        </button>
      </div>
      <button class="topbar-toggler more">
        <i class="gg-more-vertical-alt"></i>
      </button>
    </div>
    <!-- End Logo Header -->
  </div>
  <div class="sidebar-wrapper scrollbar scrollbar-inner">
    <div class="sidebar-content">
      <ul class="nav nav-secondary">

      @if(auth()->user()->hasRole('admin'))
      
      @endif


        <li class="nav-item active">
          <a data-bs-toggle="collapse" href="#dasbor" class="collapsed" aria-expanded="false">
            <i class="fas fa-home"></i>
            <p>Dasbor</p>
            <span class="caret"></span>
          </a>
          <div class="collapse @if(Request::segment(2) == 'dasbor' || Request::segment(2) == '') show @endif" id="dasbor">
            <ul class="nav nav-collapse">
              <li @if(Request::segment(2) == 'dasbor' || Request::segment(2) == '') class="active" @endif>
                <a href="{{ auth()->user()->hasRole('admin') ? route('admin.dasbor') : route('pimpinan.dasbor') }}">
                  <span class="sub-item">Dasbor</span>
                </a>
              </li>
            </ul>
          </div>
        </li>





        <li class="nav-section">
          <span class="sidebar-mini-icon">
            <i class="fa fa-ellipsis-h"></i>
          </span>
          <h4 class="text-section">Statistik</h4>
        </li>


{{--       

        <!-- Ringkasan Statistik -->
        <li class="nav-item @if(Request::segment(2) == 'statistik') active @endif">
          <a data-bs-toggle="collapse" href="#ringkasan-statistik" class="collapsed" aria-expanded="false">
            <i class="fas fa-chart-bar"></i>
            <p>Ringkasan Statistik</p>
            <span class="caret"></span>
          </a>
          <div class="collapse @if(Request::segment(2) == 'statistik') show @endif" id="ringkasan-statistik">
            <ul class="nav nav-collapse">
              
              <li @if(Request::segment(2) == 'statistik' && Request::segment(3) == 'anggota') class="active" @endif">
                <a href="{{ auth()->user()->hasRole('admin') ? route('admin.statistik.anggota') : route('pimpinan.statistik.anggota') }}">
                  <span class="sub-item">Statistik Anggota Berdasarkan Status</span>
                </a>
              </li>
              
              <li @if(Request::segment(2) == 'statistik' && Request::segment(3) == 'alumni') class="active" @endif">
                <a href="{{ auth()->user()->hasRole('admin') ? route('admin.statistik.alumni') : route('pimpinan.statistik.alumni') }}">
                  <span class="sub-item">Statistik Alumni</span>
                </a>
              </li>
              
              <li @if(Request::segment(2) == 'statistik' && Request::segment(3) == 'program-studi') class="active" @endif">
                <a href="{{ auth()->user()->hasRole('admin') ? route('admin.statistik.programstudi') : route('pimpinan.statistik.programstudi') }}">
                  <span class="sub-item">Statistik Program Studi, Fakultas & Universitas</span>
                </a>
              </li>

            </ul>
          </div>
        </li> --}}





        
        <li class="nav-section">
          <span class="sidebar-mini-icon">
            <i class="fa fa-ellipsis-h"></i>
          </span>
          <h4 class="text-section">Manajemen Data</h4>
        </li>


      

        <!-- pendeta -->
        <li class="nav-item submenu @if(Request::segment(2) == 'pendeta') active @endif" ">
          <a data-bs-toggle="collapse" href="#pendeta" class="collapsed" aria-expanded="false">
            <i class="fas fa-users"></i>
            <p>Manajemen Data</p>
            <span class="caret"></span>
          </a>
          <div class="collapse @if(Request::segment(2) == 'pendeta') show @endif" id="pendeta">
            <ul class="nav nav-collapse">
              
              <li @if(Request::segment(1) == 'jemaat') class="active" @endif>
                <a href="{{ route('jemaat.index') }}">
                  <span class="sub-item">Jemaat</span>
                </a>
              </li>

              <li @if(Request::segment(1) == 'majelis') class="active" @endif>
                <a href="{{ route('majelis.index') }}">
                  <span class="sub-item">Majelis</span>
                </a>
              </li>

              <li @if(Request::segment(1) == 'pendeta') class="active" @endif>
                <a href="{{ route('pendeta.index') }}">
                  <span class="sub-item">Pendeta</span>
                </a>
              </li>

              <li @if(Request::segment(1) == 'admin-super') class="active" @endif>
                <a href="{{ route('admin.index') }}">
                  <span class="sub-item">Admin Super</span>
                </a>
              </li>


            </ul>
          </div>
        </li>


      

           
            
      </ul>
    </div>
  </div>
</div>
<!-- End Sidebar -->