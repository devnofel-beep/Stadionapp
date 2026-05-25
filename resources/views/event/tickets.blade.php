@extends('layouts.app')

@section('content')

<div class="container mt-5">

    <h2 class="mb-4">
        Pilih Tiket
    </h2>

    <div class="row">

        @foreach($event->tickets as $ticket)

        <div class="col-md-4 mb-4">

            <div class="card shadow-sm h-100">

                <div class="card-body">

                    <h4>
                        {{ strtoupper($ticket->kategori) }}
                    </h4>

                    <p>
                        Zona:
                        {{ $ticket->nama_zona }}
                    </p>

                    <p>
                        Gate:
                        {{ $ticket->gate }}
                    </p>

                    <h5 class="text-primary">
                        Rp {{ number_format($ticket->harga) }}
                    </h5>

                    <p>
                        Kuota:
                        {{ $ticket->kuota }}
                    </p>

                    <button class="btn btn-primary w-100">

                        Beli Tiket

                    </button>

                </div>

            </div>

        </div>

        @endforeach

    </div>

</div>

@endsection