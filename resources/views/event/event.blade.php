@extends('layouts.app')

@section('content')

<!-- 🔥 HERO -->
<div class="bg-dark text-white py-5 text-center">
    <div class="container">
        <h2 class="fw-bold">Event Stadion</h2>
        <p>Temukan dan pesan tiket event favoritmu</p>
    </div>
</div>

<!-- 🔍 SEARCH + FILTER -->
<div class="container my-4">
    <div class="row g-3">

        <!-- SEARCH -->
        <div class="col-md-6">
            <input type="text" id="searchInput" class="form-control" placeholder="Cari event...">
        </div>

        <!-- FILTER -->
        <div class="col-md-6 text-md-end text-center">
            <button class="btn btn-secondary me-2" onclick="filterEvent('all')">Semua</button>
            <button class="btn btn-outline-primary me-2" onclick="filterEvent('bola')">Sepak Bola</button>
            <button class="btn btn-outline-success me-2" onclick="filterEvent('konser')">Konser</button>
            <button class="btn btn-outline-warning me-2" onclick="filterEvent('basket')">Basket</button>
            <button class="btn btn-outline-danger me-2" onclick="filterEvent('otomotif')">Otomotif</button>
            <button class="btn btn-outline-dark" onclick="filterEvent('lain')">Lainnya</button>
        </div>

    </div>
</div>

<!-- 🎟️ EVENT BERLANGSUNG -->
<div class="container">

    <h3 class="mb-4">Event Sedang Berlangsung</h3>
    <div class="row g-4" id="eventList">

    @foreach($events as $event)

    <div class="col-md-4 event-item"
         data-kategori="{{ strtolower($event->status) }}">

        <div class="card border-0 shadow-lg rounded-4 overflow-hidden h-100 event-card">

            <!-- IMAGE -->
            <div class="position-relative overflow-hidden">

                <img src="{{ asset('img/' . $event->banner) }}"
                     class="card-img-top event-image">

                <!-- STATUS BADGE -->
                <span class="badge bg-success position-absolute top-0 end-0 m-3 px-3 py-2 rounded-pill">

                    {{ $event->status }}

                </span>

            </div>

            <!-- BODY -->
            <div class="card-body d-flex flex-column">

                <!-- TITLE -->
                <h4 class="fw-bold mb-3 text-dark">

                    {{ $event->nama_event }}

                </h4>

                <!-- DATE -->
                <p class="text-muted mb-2">

                    <i class="bi bi-calendar-event me-2 text-primary"></i>

                    {{ $event->tanggal }}

                </p>

                <!-- TIME -->
                <p class="text-muted mb-3">

                    <i class="bi bi-clock me-2 text-primary"></i>

                    {{ $event->jam }}

                </p>

                <!-- DESCRIPTION -->
                <p class="text-secondary flex-grow-1">

                    {{ Str::limit($event->deskripsi, 100) }}

                </p>

                <!-- BUTTON -->
                <a href="/event/{{ $event->id_event }}"
                   class="btn btn-primary rounded-pill mt-3">

                    🎟️ Lihat Detail

                </a>

            </div>

        </div>

    </div>

    @endforeach

</div>

@endsection


@section('scripts')
<script>

// 🔥 FILTER
function filterEvent(kategori) {
    let items = document.querySelectorAll('.event-item');

    items.forEach(item => {
        if (kategori === 'all' || item.dataset.kategori === kategori) {
            item.style.display = 'block';
        } else {
            item.style.display = 'none';
        }
    });
}

// 🔍 SEARCH
document.addEventListener("DOMContentLoaded", function() {
    let input = document.getElementById('searchInput');

    input.addEventListener('keyup', function() {
        let keyword = this.value.toLowerCase();
        let items = document.querySelectorAll('.event-item');

        items.forEach(item => {
            let title = item.querySelector('.card-title').innerText.toLowerCase();

            if (title.includes(keyword)) {
                item.style.display = 'block';
            } else {
                item.style.display = 'none';
            }
        });
    });
});

</script>

@endsection