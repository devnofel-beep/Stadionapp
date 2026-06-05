@extends('layouts.app')

@section('content')

<pre>
    {{ print_r($event) }}
</pre>

<div class="container mt-5">


    <h2>Pilih Kursi</h2>

    <div class="card p-3 mb-4">

        <h5>Jumlah Tiket</h5>

        <div class="ticket-counter">

            <button type="button" id="btnMinus">−</button>

            <span id="jumlahTiket">1</span>

            <button type="button" id="btnPlus">+</button>

        </div>

        <small class="text-muted">
            Maksimal 8 tiket
        </small>

        <div class="mt-4">
            <span class="badge bg-success">Tersedia</span>
            <span class="badge bg-primary">Dipilih</span>
            <span class="badge bg-danger">Terjual</span>
        </div>

    <style>
        .ticket-counter{
                display:flex;
                align-items:center;
                gap:15px;
            }

            .ticket-counter button{
                width:40px;
                height:40px;
                border:none;
                border-radius:50%;
                font-size:22px;
                font-weight:bold;
                cursor:pointer;
            }

            .ticket-counter span{
                min-width:30px;
                text-align:center;
                font-size:20px;
                font-weight:600;
            }

            .seat-container{
                display:flex;
                flex-wrap:wrap;
                gap:10px;
            }

            .seat-btn{
                width:70px;
                height:55px;
                border:1px solid #198754;
                background:white;
                color:#198754;
                border-radius:10px;
                transition:.2s;
            }

            .seat-btn:hover{
                transform:translateY(-2px);
            }

            .seat-selected{
                background:#0d6efd;
                color:white;
                border:none;
            }

            .seat-sold{
                background:#dc3545;
                color:white;
                border:none;
                cursor:not-allowed;
            }
    </style>
</div>

    <p>Tribun : {{ strtoupper($zona) }}</p>
    <p>Blok : {{ strtoupper($blok) }}</p>

    <div class="seat-container mt-4">

        @for($i = 1; $i <= 10; $i++)

            <button
                type="button"
                class="seat-btn"
                data-seat="{{ strtoupper($blok) }}{{ $i }}">
                {{ strtoupper($blok) }}{{ $i }}
            </button>

        @endfor

    </div>

    <div class="card mt-4 p-3">

        <h5>Kursi Dipilih</h5>

        <p id="selectedSeats">
            -
        </p>

            <!-- <button
                id="btnCheckout"
                class="btn btn-success"
                disabled>

                Lanjut Checkout

            </button> -->
            <a href="/Checkout"
                id="btnCheckout"
                class="btn btn-success disabled">

                Lanjut Checkout
            </a>

    </div>

    <h1>ID EVENT: {{ $event->id_event }}</h1>

<script>

    let jumlah = 1;

    let selectedSeats = [];

    const tampilJumlah =
    document.getElementById('jumlahTiket');

    const seatInfo =
    document.getElementById('selectedSeats');

    const btnCheckout =
    document.getElementById('btnCheckout');

    document
    .getElementById('btnPlus')
    .addEventListener('click', function(){

        if(jumlah < 8)
        {
            jumlah++;
            tampilJumlah.innerText = jumlah;
        }

    });

    document
    .getElementById('btnMinus')
    .addEventListener('click', function(){

        if(jumlah > 1)
        {
            jumlah--;

            tampilJumlah.innerText = jumlah;

            while(selectedSeats.length > jumlah)
            {
                let seat = selectedSeats.pop();

                document
                .querySelector(
                    `[data-seat="${seat}"]`
                )
                .classList.remove('seat-selected');
            }

            updateInfo();
        }

    });

    document
    .querySelectorAll('.seat-btn')
    .forEach(btn => {

        btn.addEventListener('click', function(){

            let seat =
            this.dataset.seat;

            if(
                this.classList.contains(
                    'seat-selected'
                )
            ){
                this.classList.remove(
                    'seat-selected'
                );

                selectedSeats =
                selectedSeats.filter(
                    s => s !== seat
                );

            }else{

                if(
                    selectedSeats.length >= jumlah
                ){
                    alert(
                        'Jumlah kursi sudah sesuai jumlah tiket'
                    );
                    return;
                }

                this.classList.add(
                    'seat-selected'
                );

                selectedSeats.push(seat);
            }

            updateInfo();

        });

    });
    
    const zona = "{{ $zona }}";
    const blok = "{{ $blok }}";
    const eventId = "{{ $event->id_event }}";
    console.log('eventId=', eventId);
    function updateInfo()
    {
        seatInfo.innerText =
        selectedSeats.length
        ?
        selectedSeats.join(', ')
        :
        '-';

        if(selectedSeats.length === jumlah)
        {
        btnCheckout.classList.remove('disabled');

            btnCheckout.href =
                `/checkout/${eventId}/${zona}/${blok}`
                + '?kursi='
                + selectedSeats.join(',')
                + '&jumlah='
                + jumlah;

            console.log(btnCheckout.href);
        }
        else
        {
            btnCheckout.classList.add('disabled');
            btnCheckout.href = '#';
        }
    }

        updateInfo();





      //  btnCheckout.disabled =
        //selectedSeats.length !== jumlah;

        // if(selectedSeats.length === jumlah)
        // {
        // btnCheckout.classList.remove('disabled');
        //     }
        //      else
        //     {
        //         btnCheckout.classList.add('disabled');
        // }

        // if(selectedSeats.length === jumlah)
        // {
        //     btnCheckout.classList.remove('disabled');

        //     btnCheckout.href =
        //         `/checkout/${zona}/${blok}`
        //         + '?kursi='
        //         + selectedSeats.join(',')
        //         + '&jumlah='
        //         + jumlah;
        // } else
        //     {
        //         btnCheckout.classList.add('disabled');
        //         btnCheckout.href = '#';
        //     }

    


</script>

@endsection
