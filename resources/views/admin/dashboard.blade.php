@extends('layouts.app')

@section('content')

<div class="container-fluid py-4">

    <!-- HEADER -->
    <div class="card border-0 shadow-lg mb-4 bg-primary text-white rounded-4">

        <div class="card-body d-flex justify-content-between align-items-center flex-wrap">

            <div>
                <h2 class="fw-bold mb-1">
                    Dashboard Admin
                </h2>

                <p class="mb-0 opacity-75">
                    Kelola event stadion dengan mudah
                </p>
            </div>

            @auth
            <div class="bg-white text-primary px-4 py-2 rounded-pill shadow-sm">

                👋 Halo,
                <strong>{{ Auth::user()->name }}</strong>

            </div>
            @endauth

        </div>

    </div>


    <!-- KPI -->
    <div class="row g-4 mb-4">

        <!-- TOTAL EVENT -->
        <div class="col-md-3">

            <div class="card border-0 shadow-lg rounded-4 dashboard-card bg-primary text-white h-100">

                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>

                            <h6 class="opacity-75">
                                Total Event
                            </h6>

                            <h2 class="fw-bold counter">
                                {{ $totalEvent ?? 0 }}
                            </h2>

                        </div>

                        <div class="icon-box">
                            🎫
                        </div>

                    </div>

                </div>

            </div>

        </div>

        <!-- TIKET -->
        <div class="col-md-3">

            <div class="card border-0 shadow-lg rounded-4 dashboard-card bg-success text-white h-100">

                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>

                            <h6 class="opacity-75">
                                Tiket Terjual
                            </h6>

                            <h2 class="fw-bold counter">
                                {{ $totalTiket ?? 0 }}
                            </h2>

                        </div>

                        <div class="icon-box">
                            🎟️
                        </div>

                    </div>

                </div>

            </div>

        </div>

        <!-- PENDAPATAN -->
        <div class="col-md-3">

            <div class="card border-0 shadow-lg rounded-4 dashboard-card bg-warning text-dark h-100">

                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>

                            <h6 class="opacity-75">
                                Pendapatan
                            </h6>

                            <h2 class="fw-bold">
                                Rp {{ $totalPendapatan ?? 0 }}
                            </h2>

                        </div>

                        <div class="icon-box">
                            💰
                        </div>

                    </div>

                </div>

            </div>

        </div>

        <!-- USER -->
        <div class="col-md-3">

            <div class="card border-0 shadow-lg rounded-4 dashboard-card bg-danger text-white h-100">

                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>

                            <h6 class="opacity-75">
                                Total User
                            </h6>

                            <h2 class="fw-bold counter">
                                {{ $totalUser ?? 0 }}
                            </h2>

                        </div>

                        <div class="icon-box">
                            👥
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>


    <!-- EVENT TERBARU -->
    <div class="card border-0 shadow-lg rounded-4 mb-4">

        <div class="card-header bg-primary text-white rounded-top-4 d-flex justify-content-between align-items-center py-3">

            <h5 class="mb-0">
                Event Terbaru
            </h5>

            <a href="/admin/event/create"
               class="btn btn-light text-primary fw-semibold">

                + Tambah Event

            </a>

        </div>

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-hover align-middle">

                    <thead class="table-light">

                        <tr>

                            <th>Banner</th>
                            <th>Nama Event</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                            <th>Aksi</th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($events ?? [] as $event)

                        <tr class="event-row">

                            <td>

                                <img src="{{ asset('img/' . $event->banner) }}"
                                     width="80"
                                     class="rounded shadow-sm">

                            </td>

                            <td>

                                <strong>
                                    {{ $event->nama_event }}
                                </strong>

                            </td>

                            <td>
                                {{ $event->tanggal }}
                            </td>

                            <td>

                                <span class="badge bg-success px-3 py-2">

                                    {{ $event->status }}

                                </span>

                            </td>

                            <td>

                                <a href="/admin/event/edit/{{ $event->id_event }}"
                                    class="btn btn-warning btn-sm action-btn">
                                    Edit
                                </a>

                                <a href="/admin/event/delete/{{ $event->id_event }}"
                                    class="btn btn-danger btn-sm action-btn deleteBtn">
                                    Hapus
                                </a>

                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td colspan="5"
                                class="text-center py-4 text-muted">

                                Belum ada event

                            </td>

                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>


    <!-- AKSI CEPAT -->
    <div class="card border-0 shadow-lg rounded-4">

        <div class="card-header bg-primary text-white rounded-top-4 py-3">

            <h5 class="mb-0">
                Aksi Cepat
            </h5>

        </div>

        <div class="card-body">

            <div class="d-flex flex-wrap gap-3">

                <a href="/admin/event/create"
                   class="btn btn-primary btn-lg quick-btn">

                    ➕ Tambah Event

                </a>

                <a href="/admin/produk"
                   class="btn btn-success btn-lg quick-btn">

                    🛍️ Merchandise

                </a>

                <a href="/admin/transaksi"
                   class="btn btn-warning btn-lg quick-btn">

                    💳 Transaksi

                </a>

            </div>

        </div>

    </div>

</div>

@endsection


@section('scripts')

<script>

// ======================
// HOVER EFFECT TABLE
// ======================

const rows =
    document.querySelectorAll('.event-row');

rows.forEach(row => {

    row.addEventListener('mouseenter', () => {

        row.style.transform = 'scale(1.01)';
        row.style.transition = '0.2s';

    });

    row.addEventListener('mouseleave', () => {

        row.style.transform = 'scale(1)';

    });

});


// ======================
// DELETE CONFIRMATION
// ======================

const deleteBtns =
    document.querySelectorAll('.deleteBtn');

deleteBtns.forEach(btn => {

    btn.addEventListener('click', function() {

        let confirmDelete =
            confirm('Yakin ingin menghapus event ini?');

        if(confirmDelete){

            alert('Event berhasil dihapus');

        }

    });

});


// ======================
// CARD ANIMATION
// ======================

const cards =
    document.querySelectorAll('.dashboard-card');

cards.forEach(card => {

    card.addEventListener('mouseenter', () => {

        card.style.transform = 'translateY(-5px)';
        card.style.transition = '0.3s';

    });

    card.addEventListener('mouseleave', () => {

        card.style.transform = 'translateY(0px)';

    });

});


// ======================
// QUICK BUTTON EFFECT
// ======================

const quickBtns =
    document.querySelectorAll('.quick-btn');

quickBtns.forEach(btn => {

    btn.addEventListener('mouseenter', () => {

        btn.style.transform = 'scale(1.05)';
        btn.style.transition = '0.2s';

    });

    btn.addEventListener('mouseleave', () => {

        btn.style.transform = 'scale(1)';

    });

});

</script>

@endsection