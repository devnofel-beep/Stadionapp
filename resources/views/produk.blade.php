@extends('layouts.app')

@section('content')

<!-- 🔥 HERO -->
<div class="bg-dark text-white py-5 text-center">
    <div class="container">
        <h2 class="fw-bold">Merchandise Stadion</h2>
        <p>Beli Merchandise resmi favoritmu</p>
    </div>
</div>

<!-- 🔍 SEARCH + FILTER -->
<div class="container my-4">
    <div class="row g-3">

        <!-- SEARCH -->
        <div class="col-md-6">
            <input type="text" id="searchInput" class="form-control" placeholder="Cari merchandise...">
        </div>

        <!-- FILTER -->
        <div class="col-md-6 text-md-end text-center">
            <button class="btn btn-secondary me-2" onclick="filterItem('all')">Semua</button>
            <button class="btn btn-outline-primary me-2" onclick="filterItem('jersey')">Jersey</button>
            <button class="btn btn-outline-success me-2" onclick="filterItem('aksesoris')">Aksesoris</button>
            <button class="btn btn-outline-dark" onclick="filterItem('lain')">Lainnya</button>
        </div>

    </div>
</div>

<!-- 🛒 PRODUK -->
<div class="container">

    <h3 class="mb-4">Produk Merchandise</h3>

    <div class="row g-4" id="productList">

        <!-- ITEM 1 -->
        <div class="col-md-4 product-item" data-kategori="jersey">
            <div class="card h-100 shadow-sm">

                <img src="{{ asset('img/jersey.jpeg') }}" class="card-img-top">

                <div class="card-body">
                    <span class="badge bg-primary mb-2">Jersey</span>

                    <h5 class="card-title">Jersey Tim Home</h5>
                    <p class="text-muted">Stok tersedia</p>

                    <p class="fw-bold text-success">Rp 250.000</p>

                    <button class="btn btn-primary w-100">
                        Beli Sekarang
                    </button>
                </div>

            </div>
        </div>

        <!-- ITEM 2 -->
        <div class="col-md-4 product-item" data-kategori="aksesoris">
            <div class="card h-100 shadow-sm">

                <img src="{{ asset('img/topi.jpeg') }}" class="card-img-top">

                <div class="card-body">
                    <span class="badge bg-success mb-2">Aksesoris</span>

                    <h5 class="card-title">Topi Official</h5>
                    <p class="text-muted">Stok tersedia</p>

                    <p class="fw-bold text-success">Rp 120.000</p>

                    <button class="btn btn-primary w-100">
                        Beli Sekarang
                    </button>
                </div>

            </div>
        </div>

        <!-- ITEM 3 -->
        <div class="col-md-4 product-item" data-kategori="lain">
            <div class="card h-100 shadow-sm">

                <img src="{{ asset('img/syal.jpeg') }}" class="card-img-top">

                <div class="card-body">
                    <span class="badge bg-dark mb-2">Lainnya</span>

                    <h5 class="card-title">Syal Supporter</h5>
                    <p class="text-muted">Stok tersedia</p>

                    <p class="fw-bold text-success">Rp 90.000</p>

                    <button class="btn btn-primary w-100">
                        Beli Sekarang
                    </button>
                </div>

            </div>
        </div>

    </div>
</div>

@endsection


@section('scripts')
<script>

// 🔥 FILTER
function filterItem(kategori) {
    let items = document.querySelectorAll('.product-item');

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
        let items = document.querySelectorAll('.Merchandise-item');

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