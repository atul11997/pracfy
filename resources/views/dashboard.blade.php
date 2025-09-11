@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row g-4 mt-3">
            <!-- Section Card -->
            <div class="col-lg-3 col-md-6">
                <a href="{{ route('section.list') }}" class="text-decoration-none">
                    <div class="card shadow-sm border-0 rounded-3 h-100">
                        <div class="card-body text-center">
                            <div class="mb-3">
                                <i class="bi bi-grid-3x3-gap-fill fs-1 text-primary"></i>
                            </div>
                            <h3 class="fw-bold">{{ $totalsections }}</h3>
                            <p class="mb-0 text-muted">Active Sections</p>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Services Card -->
            <div class="col-lg-3 col-md-6">
                <a href="{{ route('service.list') }}" class="text-decoration-none">
                    <div class="card shadow-sm border-0 rounded-3 h-100">
                        <div class="card-body text-center">
                            <div class="mb-3">
                                <i class="bi bi-heart-pulse-fill fs-1 text-info"></i>
                            </div>
                            <h3 class="fw-bold">{{ $totalservices }}</h3>
                            <p class="mb-0 text-muted">Services</p>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Gallery Card -->
            <div class="col-lg-3 col-md-6">
                <a href="{{ route('gallery.list') }}" class="text-decoration-none">
                    <div class="card shadow-sm border-0 rounded-3 h-100">
                        <div class="card-body text-center">
                            <div class="mb-3">
                                <i class="bi bi-images fs-1 text-warning"></i>
                            </div>
                            <h3 class="fw-bold">{{ $totalphotos }}</h3>
                            <p class="mb-0 text-muted">Total Photos</p>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Videos Card -->
            <div class="col-lg-3 col-md-6">
                <a href="{{ route('video.list') }}" class="text-decoration-none">
                    <div class="card shadow-sm border-0 rounded-3 h-100">
                        <div class="card-body text-center">
                            <div class="mb-3">
                                <i class="bi bi-camera-video-fill fs-1 text-danger"></i>
                            </div>
                            <h3 class="fw-bold">{{ $totalvideo }}</h3>
                            <p class="mb-0 text-muted">Total Videos</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="row g-4 mt-3">
            <!-- Section Card -->
            <div class="col-lg-3 col-md-6">
                <a href="{{ route('department.list') }}" class="text-decoration-none">
                    <div class="card shadow-sm border-0 rounded-3 h-100">
                        <div class="card-body text-center">
                            <div class="mb-3">
                                <i class="bi bi-diagram-3 text-secondary fs-1"></i>
                            </div>
                            <h3 class="fw-bold">{{ $totaldepartments }}</h3>
                            <p class="mb-0 text-muted">Departments</p>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Services Card -->
            <div class="col-lg-3 col-md-6">
                <a href="{{ route('doctors.list') }}" class="text-decoration-none">
                    <div class="card shadow-sm border-0 rounded-3 h-100">
                        <div class="card-body text-center">
                            <div class="mb-3">
                                <i class="bi bi-capsule fs-1 text-success"></i>
                            </div>
                            <h3 class="fw-bold">{{ $totaldoctor }}</h3>
                            <p class="mb-0 text-muted">Doctors</p>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Gallery Card -->
            <div class="col-lg-3 col-md-6">
                <a href="{{ route('blog.list') }}" class="text-decoration-none">
                    <div class="card shadow-sm border-0 rounded-3 h-100">
                        <div class="card-body text-center">
                            <div class="mb-3">
                                <i class="bi bi-newspaper text-warning fs-1"></i>
                            </div>
                            <h3 class="fw-bold">{{ $totalblog }}</h3>
                            <p class="mb-0 text-muted">Blogs</p>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Videos Card -->
            <div class="col-lg-3 col-md-6">
                <a href="{{ route('faq.list') }}" class="text-decoration-none">
                    <div class="card shadow-sm border-0 rounded-3 h-100">
                        <div class="card-body text-center">
                            <div class="mb-3">
                                <i class="bi bi-question fs-1 text-dark"></i>
                            </div>
                            <h3 class="fw-bold">{{ $totalfaq }}</h3>
                            <p class="mb-0 text-muted">FAQ's</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        {{-- <div class="row">
            <!-- Start col -->
            <div class="col-lg-12 connectedSortable my-3">
                <div class="card mb-4">
                    <div class="card-header">
                        <h3 class="card-title">Sales Value</h3>
                    </div>
                    <div class="card-body">
                        <div id="revenue-chart"></div>
                    </div>
                </div>
            </div>

            <!-- /.Start col -->
        </div> --}}
    </div>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.min.js"
        integrity="sha256-+vh8GkaU7C9/wbSLIcwq82tQ2wTf44aOHA8HlBMwRI8=" crossorigin="anonymous"></script>
    {{-- <script>
        const sales_chart_options = {
            series: [{
                    name: 'Digital Goods',
                    data: [28, 48, 40, 19, 86, 27, 90],
                },
                {
                    name: 'Electronics',
                    data: [65, 59, 80, 81, 56, 55, 40],
                },
            ],
            chart: {
                height: 300,
                type: 'area',
                toolbar: {
                    show: false,
                },
            },
            legend: {
                show: false,
            },
            colors: ['#0d6efd', '#20c997'],
            dataLabels: {
                enabled: false,
            },
            stroke: {
                curve: 'smooth',
            },
            xaxis: {
                type: 'datetime',
                categories: [
                    '2023-01-01',
                    '2023-02-01',
                    '2023-03-01',
                    '2023-04-01',
                    '2023-05-01',
                    '2023-06-01',
                    '2023-07-01',
                ],
            },
            tooltip: {
                x: {
                    format: 'MMMM yyyy',
                },
            },
        };

        const sales_chart = new ApexCharts(
            document.querySelector('#revenue-chart'),
            sales_chart_options,
        );
        sales_chart.render();
    </script> --}}
@endsection
