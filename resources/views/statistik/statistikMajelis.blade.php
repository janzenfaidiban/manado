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
                                    <p class="fs-4 text-muted">Sistem Informasi Pendataan Jemaat Gereja Kemah Inil Indonesia GKII Moria Manado. Manajemen data Jemaat, Majelis dan Pendeta.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- .row end -->

                    <div class="row">
                        
                        <div class="col-lg-4">
                            <div class="card bg-light">
                                <div class="card-body text-center">
                                    <div id="chartMajelisPerJenisKelamin"></div>
                                </div>
                            </div>
                        </div>
                        <!-- .col end -->
                        
                        {{-- <div class="col-lg-4">
                            <div class="card bg-light">
                                <div class="card-body text-center">
                                    <div id="chartPendetaPerJenisKelamin"></div>
                                </div>
                            </div>
                        </div>
                        <!-- .col end --> --}}
                        
                    </div>
                    <!-- .row end -->

                </div>

            </div>
            <!-- end page-inner -->
        </div>
        <!-- end container -->

@stop

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>


<script>
    // API MAJELIS PER JENIS KELAMIN 
    document.addEventListener('DOMContentLoaded', function() {
        // Fetch data dari endpoint API
        fetch('/api/chart-majelis-per-jenis-kelamin')
            .then(response => response.json())
            .then(data => {
                // Format data untuk ApexCharts
                const labels = data.map(item => item.name === 'L' ? 'Laki-laki' : 'Perempuan');
                const series = data.map(item => item.y);

                var options = {
                    chart: {
                        type: 'pie',
                        height: 350
                    },
                    labels: labels,
                    series: series,
                    legend: {
                        position: 'bottom'
                    },
                    responsive: [{
                        breakpoint: 480,
                        options: {
                            chart: {
                                width: 300
                            },
                            legend: {
                                position: 'bottom'
                            }
                        }
                    }],
                    title: {
                        text: 'Jumlah Majelis Berdasarkan Jenis Kelamin'
                    }
                };

                var chartMajelisPerJenisKelamin = new ApexCharts(document.querySelector("#chartMajelisPerJenisKelamin"), options);
                chartMajelisPerJenisKelamin.render();
            })
            .catch(error => {
                console.error('Error fetching chart data:', error);
                document.querySelector('#chartMajelisPerJenisKelamin').innerHTML = '<p>Gagal memuat data chart.</p>';
            });
    });
</script>


<script>
    // API PENDETA PER JENIS KELAMIN 
    document.addEventListener('DOMContentLoaded', function() {
        // Fetch data dari endpoint API
        fetch('/api/chart-pendeta-per-jenis-kelamin')
            .then(response => response.json())
            .then(data => {
                // Format data untuk ApexCharts
                const labels = data.map(item => item.name === 'L' ? 'Laki-laki' : 'Perempuan');
                const series = data.map(item => item.y);

                var options = {
                    chart: {
                        type: 'pie',
                        height: 350
                    },
                    labels: labels,
                    series: series,
                    legend: {
                        position: 'bottom'
                    },
                    responsive: [{
                        breakpoint: 480,
                        options: {
                            chart: {
                                width: 300
                            },
                            legend: {
                                position: 'bottom'
                            }
                        }
                    }],
                    title: {
                        text: 'Jumlah Pendeta Berdasarkan Jenis Kelamin'
                    }
                };

                var chartPendetaPerJenisKelamin = new ApexCharts(document.querySelector("#chartPendetaPerJenisKelamin"), options);
                chartPendetaPerJenisKelamin.render();
            })
            .catch(error => {
                console.error('Error fetching chart data:', error);
                document.querySelector('#chartPendetaPerJenisKelamin').innerHTML = '<p>Gagal memuat data chart.</p>';
            });
    });
</script>



@endpush
