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


      

        <!-- Ringkasan Statistik -->
        <li class="nav-item @if(Request::segment(2) == 'statistik') active @endif">
          <a data-bs-toggle="collapse" href="#ringkasan-statistik" class="collapsed" aria-expanded="false">
            <i class="fas fa-chart-bar"></i>
            <p>Ringkasan Statistik</p>
            <span class="caret"></span>
          </a>
          <div class="collapse @if(Request::segment(2) == 'statistik-jemaat' || Request::segment(2) == 'statistik-majelis') show @endif" id="ringkasan-statistik">
            <ul class="nav nav-collapse">
              
              <li @if(Request::segment(2) == 'statistik-jemaat') class="active" @endif">
                <a href="{{ auth()->user()->hasRole('admin') ? route('admin.statistikJemaat') : route('pimpinan.statistikJemaat') }}">
                  <span class="sub-item">Statistik Jemaat</span>
                </a>
              </li>
              
              <li @if(Request::segment(2) == 'statistik-majelis') class="active" @endif">
                <a href="{{ auth()->user()->hasRole('admin') ? route('admin.statistikMajelis') : route('pimpinan.statistikMajelis') }}">
                  <span class="sub-item">Statistik Majelis</span>
                </a>
              </li>
              
              {{-- <li @if(Request::segment(2) == 'statistik-majelis') class="active" @endif">
                <a href="{{ auth()->user()->hasRole('admin') ? route('admin.statistikPendeta') : route('pimpinan.statistikPendeta') }}">
                  <span class="sub-item">Statistik Pendeta</span>
                </a>
              </li> --}}

            </ul>
          </div>
        </li>





        
        <li class="nav-section">
          <span class="sidebar-mini-icon">
            <i class="fa fa-ellipsis-h"></i>
          </span>
          <h4 class="text-section">Manajemen Data</h4>
        </li>


      

        <!-- manajemen-data -->
        @php
            $activeSegments = ['jemaat', 'majelis', 'pendeta', 'admin-super'];
            $segment2 = Request::segment(2);
        @endphp

        <li class="nav-item submenu {{ in_array($segment2, $activeSegments) ? 'active' : '' }}">
            <a data-bs-toggle="collapse" href="#manajemen-data" 
              class="{{ in_array($segment2, $activeSegments) ? '' : 'collapsed' }}" 
              aria-expanded="{{ in_array($segment2, $activeSegments) ? 'true' : 'false' }}">
                <i class="fas fa-users"></i>
                <p>Manajemen Data</p>
                <span class="caret"></span>
            </a>

            <div class="collapse {{ in_array($segment2, $activeSegments) ? 'show' : '' }}" id="manajemen-data">
                <ul class="nav nav-collapse">
                    <li class="{{ $segment2 == 'jemaat' ? 'active' : '' }}">
                        <a href="{{ route('jemaat.index') }}">
                            <span class="sub-item">Jemaat</span>
                        </a>
                    </li>

                    <li class="{{ $segment2 == 'majelis' ? 'active' : '' }}">
                        <a href="{{ route('majelis.index') }}">
                            <span class="sub-item">Majelis</span>
                        </a>
                    </li>

                    <li class="{{ $segment2 == 'pendeta' ? 'active' : '' }}">
                        <a href="{{ route('pendeta.index') }}">
                            <span class="sub-item">Pendeta</span>
                        </a>
                    </li>

                    <li class="{{ $segment2 == 'admin-super' ? 'active' : '' }}">
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