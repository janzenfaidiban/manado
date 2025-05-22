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
                                    <p>Jumlah Jemaat per Jenis Kelamin</p>
                                    <div id="chartJemaatPerJenisKelamin"></div>
                                </div>
                            </div>
                        </div>
                        <!-- .col end -->

                        <div class="col-lg-4">
                            <div class="card bg-light">
                                <div class="card-body text-center">
                                    <p>Jumlah Jemaat per Status Baptis</p>
                                    <div id="chartJemaatPerStatusBaptis"></div>
                                </div>
                            </div>
                        </div>
                        <!-- .col end -->

                        <div class="col-lg-4">
                            <div class="card bg-light">
                                <div class="card-body text-center">
                                    <p>Jumlah Jemaat per Lingkungan</p>
                                    <div id="chartJemaatPerLingkungan"></div>
                                </div>
                            </div>
                        </div>
                        <!-- .col end -->

                        <div class="col-lg-6">
                            <div class="card bg-light">
                                <div class="card-body text-center">
                                    <p>Jumlah Jemaat per Pendidikan Terakhir</p>
                                    <div id="chartJemaatPerPendidikanTerakhir"></div>
                                </div>
                            </div>
                        </div>
                        <!-- .col end -->

                        <div class="col-6">
                            <div class="card bg-light">
                                <div class="card-body text-center">
                                    <p>Jumlah Jemaat per Pekerjaan</p>
                                    <div id="chartJemaatPerPekerjaan"></div>
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
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

<script>
    // API JEMAAT PER JENIS KELAMIN 
    document.addEventListener('DOMContentLoaded', function() {
    // Fetch data dari endpoint API
    fetch('/api/chart-jemaat-per-jenis-kelamin')
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
            // title: {
            // text: 'Jumlah Jemaat Berdasarkan Jenis Kelamin'
            // }
        };

        var chartJemaatPerJenisKelamin = new ApexCharts(document.querySelector("#chartJemaatPerJenisKelamin"), options);
        chartJemaatPerJenisKelamin.render();
        })
        .catch(error => {
        console.error('Error fetching chart data:', error);
        document.querySelector('#chartJemaatPerJenisKelamin').innerHTML = '<p>Gagal memuat data chart.</p>';
        });
    });
</script>

<script>
    // API JEMAAT PER STATUS BAPTIS
    document.addEventListener('DOMContentLoaded', function() {
        fetch('/api/chart-jemaat-per-status-baptis')
            .then(response => response.json())
            .then(data => {
                // Format data untuk ApexCharts
                const labels = data.map(item => item.name);
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
                    // title: {
                    //     text: 'Jumlah Jemaat Berdasarkan Status Baptis'
                    // }
                };

                var chartJemaatPerStatusBaptis = new ApexCharts(document.querySelector("#chartJemaatPerStatusBaptis"), options);
                chartJemaatPerStatusBaptis.render();
            })
            .catch(error => {
                console.error('Error fetching chart data:', error);
                document.querySelector('#chartJemaatPerStatusBaptis').innerHTML = '<p>Gagal memuat data chart.</p>';
            });
    });
</script>

<script>
    // API JEMAAT PER LINGKUNGAN
    document.addEventListener('DOMContentLoaded', function() {
        fetch('/api/chart-jemaat-per-lingkungan')
            .then(response => response.json())
            .then(data => {
                // Format data untuk ApexCharts
                const labels = data.map(item => item.name);
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
                    // title: {
                    //     text: 'Jumlah Jemaat Berdasarkan Lingkungan'
                    // }
                };

                var chartJemaatPerLingkungan = new ApexCharts(document.querySelector("#chartJemaatPerLingkungan"), options);
                chartJemaatPerLingkungan.render();
            })
            .catch(error => {
                console.error('Error fetching chart data:', error);
                document.querySelector('#chartJemaatPerLingkungan').innerHTML = '<p>Gagal memuat data chart.</p>';
            });
    });
</script>

{{-- <script>
    // API JEMAAT PER PENDIDIKAN TERAKHIR
    document.addEventListener('DOMContentLoaded', function() {
        fetch('/api/chart-jemaat-per-pendidikan-terakhir')
            .then(response => response.json())
            .then(data => {
                // Format data untuk ApexCharts
                const labels = data.map(item => item.name);
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
                    // title: {
                    //     text: 'Jumlah Jemaat Berdasarkan Pendidikan Terakhir'
                    // }
                };

                var chartJemaatPerPendidikanTerakhir = new ApexCharts(document.querySelector("#chartJemaatPerPendidikanTerakhir"), options);
                chartJemaatPerPendidikanTerakhir.render();
            })
            .catch(error => {
                console.error('Error fetching chart data:', error);
                document.querySelector('#chartJemaatPerPendidikanTerakhir').innerHTML = '<p>Gagal memuat data chart.</p>';
            });
    });
</script> --}}

<script>
    // API JEMAAT PER PENDIDIKAN TERAKHIR
    document.addEventListener('DOMContentLoaded', function() {
        fetch('/api/chart-jemaat-per-pendidikan-terakhir')
            .then(response => response.json())
            .then(data => {
                // Format data untuk ApexCharts
                const labels = data.map(item => item.name);
                const series = data.map(item => item.y);

                var options = {
                    chart: {
                        type: 'bar',
                        height: 400
                    },
                    series: [{
                        name: 'Jumlah',
                        data: series
                    }],
                    xaxis: {
                        categories: labels,
                        title: {
                            text: 'Pendidikan Terakhir'
                        }
                    },
                    yaxis: {
                        title: {
                            text: 'Jumlah Jemaat'
                        }
                    },
                    // title: {
                    //     text: 'Jumlah Jemaat Berdasarkan Pendidikan Terakhir',
                    //     align: 'center'
                    // },
                    plotOptions: {
                        bar: {
                            horizontal: false,
                            columnWidth: '50%'
                        }
                    },
                    dataLabels: {
                        enabled: true
                    },
                    legend: {
                        show: false
                    }
                };

                var chartJemaatPerPendidikanTerakhir = new ApexCharts(document.querySelector("#chartJemaatPerPendidikanTerakhir"), options);
                chartJemaatPerPendidikanTerakhir.render();
            })
            .catch(error => {
                console.error('Error fetching chart data:', error);
                document.querySelector('#chartJemaatPerPendidikanTerakhir').innerHTML = '<p>Gagal memuat data chart.</p>';
            });
    });
</script>

{{-- <script>
    // API JEMAAT PER PEKERJAAN
    document.addEventListener('DOMContentLoaded', function() {
        fetch('/api/chart-jemaat-per-pekerjaan')
            .then(response => response.json())
            .then(data => {
                // Format data untuk ApexCharts
                const labels = data.map(item => item.name);
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
                    // title: {
                    //     text: 'Jumlah Jemaat Berdasarkan Pekerjaan'
                    // }
                };

                var chartJemaatPerPekerjaan = new ApexCharts(document.querySelector("#chartJemaatPerPekerjaan"), options);
                chartJemaatPerPekerjaan.render();
            })
            .catch(error => {
                console.error('Error fetching chart data:', error);
                document.querySelector('#chartJemaatPerPekerjaan').innerHTML = '<p>Gagal memuat data chart.</p>';
            });
    });
</script> --}}

<script>
    // API JEMAAT PER PEKERJAAN
    document.addEventListener('DOMContentLoaded', function() {
        fetch('/api/chart-jemaat-per-pekerjaan')
            .then(response => response.json())
            .then(data => {
                // Format data untuk ApexCharts
                const labels = data.map(item => item.name);
                const series = data.map(item => item.y);

                var options = {
                    chart: {
                        type: 'bar',
                        height: 400
                    },
                    series: [{
                        name: 'Jumlah',
                        data: series
                    }],
                    xaxis: {
                        categories: labels,
                        title: {
                            text: 'Pekerjaan'
                        }
                    },
                    yaxis: {
                        title: {
                            text: 'Jumlah Jemaat'
                        }
                    },
                    // title: {
                    //     text: 'Jumlah Jemaat Berdasarkan Pekerjaan',
                    //     align: 'center'
                    // },
                    plotOptions: {
                        bar: {
                            horizontal: false,
                            columnWidth: '50%'
                        }
                    },
                    dataLabels: {
                        enabled: true
                    },
                    legend: {
                        show: false
                    }
                };

                var chartJemaatPerPekerjaan = new ApexCharts(document.querySelector("#chartJemaatPerPekerjaan"), options);
                chartJemaatPerPekerjaan.render();
            })
            .catch(error => {
                console.error('Error fetching chart data:', error);
                document.querySelector('#chartJemaatPerPekerjaan').innerHTML = '<p>Gagal memuat data chart.</p>';
            });
    });
</script>

@endpush
