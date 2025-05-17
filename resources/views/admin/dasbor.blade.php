@extends('layouts.app')

@section('additionalHeadScripts')
    <!-- ApexChart JS -->
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
@endsection

@section('content')

        <!-- main content -->
        <div class="container">
            <div class="page-inner">

                <x-page-header 
                    :pageTitle="$pageTitle" 
                    :pageDescription="$pageDescription" 
                />

                <div class="page-category">

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <p class="fs-1">Selamat datang!</p>
                                    <p class="fs-4 text-muted">Sistem Informasi Perhimpunan Mahasiswa Katolik Indonesia Cabang Jayapura. Aplikasi ini hadir untuk memudahkan pengelolaan data anggota dan kegiatan organisasi secara efisien dan terintegrasi.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- .row end -->

                    <div class="row">
                        <div class="col-lg-3">
                            <div class="card bg-success">
                                <div class="card-body text-center">
                                    <span class="d-block text-light text-uppercase">Total Jemaat</span>
                                    <div class="display-3 text-white">{{ $totalJemaat ?? '' }}</div>
                                    <a href="{{ route('jemaat.index') }}" class="text-white"><i class="fas fa-arrow-right"></i> Tampilkan</a>
                                </div>
                            </div>
                        </div>
                        <!-- .col end -->
                        
                        <div class="col-lg-3">
                            <div class="card">
                                <div class="card-body text-center">
                                    <span class="d-block text-muted text-uppercase">Total Majelis</span>
                                    <div class="display-3 text-primary">{{ $totalMajelis ?? '' }}</div>
                                    <a href="{{ route('majelis.index') }}"><i class="fas fa-arrow-right"></i> Tampilkan</a>
                                </div>
                            </div>
                        </div>
                        <!-- .col end -->
                        
                        <div class="col-lg-3">
                            <div class="card">
                                <div class="card-body text-center">
                                    <span class="d-block text-muted text-uppercase">Total Pendeta</span>
                                    <div class="display-3 text-primary">{{ $totalPendeta ?? '' }}</div>
                                    <a href="{{ route('pendeta.index') }}"><i class="fas fa-arrow-right"></i> Tampilkan</a>
                                </div>
                            </div>
                        </div>
                        <!-- .col end -->
                        
                        <div class="col-lg-3">
                            <div class="card">
                                <div class="card-body text-center">
                                    <span class="d-block text-muted text-uppercase">Total Admin</span>
                                    <div class="display-3 text-primary">{{ $totalAdminSuper ?? '' }}</div>
                                    <a href="{{ route('admin.index') }}"><i class="fas fa-arrow-right"></i> Tampilkan</a>
                                </div>
                            </div>
                        </div>
                        <!-- .col end -->
                        
                    </div>
                    <!-- .row end -->

                </div>

            </div>
            <!-- end page-inner -->
        </div>
        <!-- end container -->

@stop

@push('scripts')



@endpush
