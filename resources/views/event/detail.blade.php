@extends('layouts.app')

@section('content')

<div class="container mt-5">

    <h1>{{ $event->nama_event }}</h1>

    <img src="{{ asset('img/' . $event->banner) }}"
         class="img-fluid rounded mb-3">

    <p>{{ $event->deskripsi }}</p>

    <p><strong>Tanggal:</strong> {{ $event->tanggal }}</p>

    <p><strong>Jam:</strong> {{ $event->jam }}</p>

    <a href="{{ url('/event/'.$event->id.'/tickets') }}" class="btn btn-primary">
        Beli Tiket
    </a>

</div>

@endsection