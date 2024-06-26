@extends('layouts.index')

@section('content')
    <div class="container mt-2 ">
        <div class="row justify-content-center mb-5">
            <div class="col">
                <h2 class="text-center mb-5">My Employee</h2>
                <div id="carouselExampleSlidesOnly" class="carousel slide w-100 mx-auto" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{ asset('images/image1.jpg') }}" class="d-block w-100" alt="Slide 1">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('images/image2.jpg') }}" class="d-block w-100" alt="Slide 2">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('images/image3.jpg') }}" class="d-block w-100" alt="Slide 3">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleSlidesOnly"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleSlidesOnly"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>

        @php
            $widgetData = app(\App\Http\Controllers\WidgetController::class)->getWidgetData();
        @endphp

        <div class="container mt-5">
            <div class="row">
                <div class="col-md-4">
                    <div class="card animated-card">
                        <div class="card-body text-center">
                            <h5 class="card-title">Total Pegawai</h5>
                            <p class="card-text">{{ $widgetData['totalEmployees'] }}</p>
                            <i data-feather="users" class="feather-icon"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card animated-card">
                        <div class="card-body text-center">
                            <h5 class="card-title">Pegawai Baru (7 Hari Terakhir)</h5>
                            <p class="card-text">{{ $widgetData['newEmployees'] }}</p>
                            <i data-feather="user-plus" class="feather-icon"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card animated-card">
                        <div class="card-body text-center">
                            <h5 class="card-title">Jabatan</h5>
                            <p class="card-text">{{ $widgetData['positions'] }}</p>
                            <i data-feather="briefcase" class="feather-icon"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
    <script>
        feather.replace();
    </script>
@endsection
