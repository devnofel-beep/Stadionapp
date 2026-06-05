@extends('layouts.app')

@section('content')

<div class="container mt-5">
    <h2>Checkout</h2>

    <div class="card shadow-sm p-4">

        <h5>Detail Pembayaran</h5>

        <hr>

        <p><strong>Event:</strong> {{ $event->nama_event }}</p>
        <p><strong>Tribun:</strong> {{ strtoupper($zona) }}</p>
        <p><strong>Blok:</strong> {{ $blok }}</p>
        <p><strong>Jumlah Tiket:</strong> {{ $jumlah }}</p>
        <p><strong>Kursi:</strong> {{ $kursi }}</p>
        <p><strong>Harga/Tiket:</strong> Rp {{ number_format($hargaPerTiket, 0, ',', '.') }}</p>


        <hr>

        <h4 class="text-success">Total Pembayaran: Rp {{ number_format($totalHarga, 0, ',', '.') }}</h4>

        <form
        action="/event/{{ $event->id_event }}/checkout/confirm"
        method="POST"
    >

            @csrf

            <input type="hidden"
                name="zona"
                value="{{ $zona }}">

            <input type="hidden"
                name="blok"
                value="{{ $blok }}">

            <input type="hidden"
                name="kursi"
                value="{{ $kursi }}">

            <input type="hidden"
                name="jumlah"
                value="{{ $jumlah }}">

            <input type="hidden"
                name="total_harga"
                value="{{ $totalHarga }}">

            <button
                type="submit"
                class="btn btn-success btn-lg"
            >
                Konfirmasi Pesanan
            </button>

        </form>

    </div>

</div>

        <!-- <div class="mt-4">
            <a href="/event/{{ $event->id_event }}/checkout/confirm" class="btn btn-success btn-lg">
                Konfirmasi Pembayaran
            </a>
        </div>
    </div> -->

@endsection  