@extends('layouts.app')

@section('content')

<div class="container mt-5">

    <h2>Pilih Blok - {{ strtoupper($zona) }}</h2>

    <div class="row">

        <div class="col-md-4">
            <a href="/event/{{ $event->id_event }}/tribun/{{ $zona }}/blok/A" class="btn btn-primary w-100">
                Blok A
            </a>
        </div>

        <div class="col-md-4">
            <a href="/event/{{ $event->id_event }}/tribun/{{ $zona }}/blok/B" class="btn btn-primary w-100">
                Blok B
            </a>
        </div>

        <div class="col-md-4">
            <a href="/event/{{ $event->id_event }}/tribun/{{ $zona }}/blok/C" class="btn btn-primary w-100">
                Blok C
            </a>
        </div>

    </div>

</div>

@endsection