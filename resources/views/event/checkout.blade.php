@extends('layouts.app')

@section('content')

<div class="container mt-5">

    <h2 class="mb-4">
        Checkout Pesanan
    </h2>

    <div class="card shadow-sm p-4">

        <h4>Ringkasan Pesanan</h4>

        <hr>

        <p>
            <strong>Event :</strong>
            Persipura vs Persija
        </p>

        <p>
            <strong>Tribun :</strong>
            VVIP Barat
        </p>

        <p>
            <strong>Blok :</strong>
            A
        </p>

        <p>
            <strong>Kursi :</strong>
            A1, A2
        </p>

        <p>
            <strong>Jumlah Tiket :</strong>
            2
        </p>

        <p>
            <strong>Harga/Tiket :</strong>
            Rp1.000.000
        </p>

        <hr>

        <h4 class="text-success">
            Total :
            Rp2.000.000
        </h4>

    </div>

</div>

@endsection