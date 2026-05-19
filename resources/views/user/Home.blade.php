@extends('layouts.app')

@section('content')

<!-- HERO -->
<div class="bg-dark text-white text-center py-5">
    <h1>Pesan Tiket Stadion</h1>
    <p>Mudah, Cepat, & Aman</p>
</div>

<!-- 🎟️ REKOMENDASI EVENT -->
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Rekomendasi Event</h3>
    </div>

    <div class="row g-4">

        <!-- CARD EVENT -->
        <div class="col-md-4">
            <div class="card h-100 shadow-sm">

                <img src="{{ asset('img/konser-musik.jpg') }}" class="card-img-top">

                <div class="card-body">
                    <h5 class="card-title">Final Liga Indonesia</h5>
                    <p class="text-muted">15 Juni 2026</p>

                    <a href="{{ url('/event') }}" class="btn btn-primary w-100">
                        Lihat Detail
                    </a>
                </div>

            </div>
        </div>

        <!-- CARD EVENT -->
        <div class="col-md-4">
            <div class="card h-100 shadow-sm">

                <img src="{{ asset('img/konser-musik.jpg') }}" class="card-img-top">

                <div class="card-body">
                    <h5 class="card-title">Final Liga Indonesia</h5>
                    <p class="text-muted">15 Juni 2026</p>

                    <a href="{{ url('/event') }}" class="btn btn-primary w-100">
                        Lihat Detail
                    </a>
                </div>

            </div>
        </div>

        <!-- CARD EVENT -->
        <div class="col-md-4">
            <div class="card h-100 shadow-sm">

                <img src="{{ asset('img/konser-musik.jpg') }}" class="card-img-top">

                <div class="card-body">
                    <h5 class="card-title">Final Liga Indonesia</h5>
                    <p class="text-muted">15 Juni 2026</p>

                    <a href="{{ url('/event') }}" class="btn btn-primary w-100">
                        Lihat Detail
                    </a>
                </div>

            </div>
        </div>
    </div>

    <!-- 🛍️ REKOMENDASI MERCH -->
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3>Rekomendasi Merchandise</h3>
        </div>

        <div class="row g-4">

            <!-- CARD MERCH -->
            <div class="col-md-3">
                <div class="card text-center shadow-sm">

                    <img src="{{ asset('img/jersey.jpg') }}" class="card-img-top">

                    <div class="card-body">
                        <h6>Jersey Tim</h6>
                        <p class="fw-bold text-primary">Rp 250.000</p>

                        <button class="btn btn-success w-100">
                            Beli
                        </button>
                    </div>

                </div>
            </div>

            <div class="col-md-3">
                <div class="card text-center shadow-sm">

                    <img src="{{ asset('img/jersey.jpg') }}" class="card-img-top">

                    <div class="card-body">
                        <h6>Jersey Tim</h6>
                        <p class="fw-bold text-primary">Rp 250.000</p>

                        <button class="btn btn-success w-100">
                            Beli
                        </button>
                    </div>

                </div>
            </div>

            <div class="col-md-3">
                <div class="card text-center shadow-sm">

                    <img src="{{ asset('img/jersey.jpg') }}" class="card-img-top">

                    <div class="card-body">
                        <h6>Jersey Tim</h6>
                        <p class="fw-bold text-primary">Rp 250.000</p>

                        <button class="btn btn-success w-100">
                            Beli
                        </button>
                    </div>

                </div>
            </div>

            <div class="col-md-3">
                <div class="card text-center shadow-sm">

                    <img src="{{ asset('img/jersey.jpg') }}" class="card-img-top">

                    <div class="card-body">
                        <h6>Jersey Tim</h6>
                        <p class="fw-bold text-primary">Rp 250.000</p>

                        <button class="btn btn-success w-100">
                            Beli
                        </button>
                    </div>

                </div>
            </div>




        </div>
    </div>

@endsection