@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">{{ __('Dashboard') }}</h1>
            </div>
        </div>
    </div>
</div>

<!-- Main content -->
<div class="content">
    <div class="container-fluid">

        <!-- Selamat Datang -->
        <div class="row mb-4">
            <div class="col-lg-12">
                <div class="card shadow-sm border-0 bg-white">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-user-circle me-2 text-primary"></i> {{ __('Welcome') }} {{ auth()->user()->name }}!</h5>
                    </div>
                </div>
            </div>
        </div>

        <!-- Statistik Dashboard -->
        <div class="row g-4">
            <!-- Anggota Fraksi -->
            <div class="col-md-3 col-sm-6">
                <div class="card shadow-sm border-0 bg-white text-dark h-100">
                    <div class="card-body d-flex align-items-center">
                        <div class="me-3 rounded-circle p-3 bg-primary-light">
                            <i class="fas fa-users fa-2x text-primary"></i>
                        </div>
                        <div>
                            <h6 class="card-title mb-1">Anggota Fraksi</h6>
                            <h4 class="fw-bold">{{ $totalAnggota }}</h4>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Interaksi Berita -->
            <div class="col-md-3 col-sm-6">
                <div class="card shadow-sm border-0 bg-white text-dark h-100">
                    <div class="card-body d-flex align-items-center">
                        <div class="me-3 rounded-circle p-3 bg-success-light">
                            <i class="fas fa-bullhorn fa-2x text-success"></i>
                        </div>
                        <div>
                            <h6 class="card-title mb-1">Interaksi Berita</h6>
                            <h4 class="fw-bold">{{ $totalInteraksi }}</h4>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Aspirasi Masuk -->
            <div class="col-md-3 col-sm-6">
                <div class="card shadow-sm border-0 bg-white text-dark h-100">
                    <div class="card-body d-flex align-items-center">
                        <div class="me-3 rounded-circle p-3 bg-warning-light">
                            <i class="fas fa-comments fa-2x text-warning"></i>
                        </div>
                        <div>
                            <h6 class="card-title mb-1">Aspirasi Masuk</h6>
                            <h4 class="fw-bold">{{ $totalAspirasi }}</h4>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pengunjung Website -->
            <div class="col-md-3 col-sm-6">
                <div class="card shadow-sm border-0 bg-white text-dark h-100">
                    <div class="card-body d-flex align-items-center">
                        <div class="me-3 rounded-circle p-3 bg-danger-light">
                            <i class="fas fa-chart-line fa-2x text-danger"></i>
                        </div>
                        <div>
                            <h6 class="card-title mb-1">Pengunjung Website</h6>
                            <h4 class="fw-bold">{{ $totalPengunjung }}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-12">
                <div class="card shadow-sm border-0 bg-white text-dark">
                    <div class="card-body">
                        <h5 class="card-title mb-4">Statistik Harian</h5>
                        <canvas id="chartDashboard" height="100"></canvas>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('chartDashboard').getContext('2d');
        const chartDashboard = new Chart(ctx, {
            type: 'line',
            data: {
                labels: {!! json_encode($chartData['labels']) !!},
                datasets: [
                    {
                        label: 'Aspirasi Masuk',
                        data: {!! json_encode($chartData['aspirasi']) !!},
                        borderColor: '#ffc107',
                        backgroundColor: 'rgba(255, 193, 7, 0.2)',
                        fill: true,
                        tension: 0.4
                    },
                    {
                        label: 'Interaksi Berita',
                        data: {!! json_encode($chartData['interaksi']) !!},
                        borderColor: '#28a745',
                        backgroundColor: 'rgba(40, 167, 69, 0.2)',
                        fill: true,
                        tension: 0.4
                    },
                    {
                        label: 'Pengunjung Website',
                        data: {!! json_encode($chartData['pengunjung']) !!},
                        borderColor: '#dc3545',
                        backgroundColor: 'rgba(220, 53, 69, 0.2)',
                        fill: true,
                        tension: 0.4
                    }
                ]
            },
            options: {
                responsive: true,
                interaction: {
                    mode: 'index',
                    intersect: false,
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

</div>

@endsection
