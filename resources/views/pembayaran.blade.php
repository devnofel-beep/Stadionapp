@extends('layouts.app')

@section('content')

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-lg-8">

            <div class="card shadow border-0 rounded-4">

                <div class="card-body p-5">

                    <h2 class="fw-bold mb-4 text-center">
                        Pembayaran Merchandise
                    </h2>

                    <!-- PRODUK -->
                    <div class="mb-4 text-center">

                        <img src="{{ asset('img/jersey.jpeg') }}"
                             class="img-fluid rounded mb-3"
                             width="250">

                        <h4 class="fw-bold">
                            Jersey Tim Home
                        </h4>

                        <p class="text-success fw-bold fs-4">
                            Rp 250.000
                        </p>

                    </div>

                    <hr>

                    <!-- FORM -->
                    <form>

                        <div class="mb-3">

                            <label class="form-label">
                                Nama Lengkap
                            </label>

                            <input type="text"
                                   class="form-control"
                                   placeholder="Masukkan nama">

                        </div>

                        <div class="mb-3">

                            <label class="form-label">
                                Email
                            </label>

                            <input type="email"
                                   class="form-control"
                                   placeholder="Masukkan email">

                        </div>

                        <div class="mb-3">

                            <label class="form-label">
                                Alamat Pengiriman
                            </label>

                            <textarea class="form-control"
                                      rows="3"
                                      placeholder="Masukkan alamat"></textarea>

                        </div>

                        <div class="mb-4">

                            <label class="form-label">
                                Metode Pembayaran
                            </label>

                            <select class="form-select">

                                <option>
                                    Transfer Bank
                                </option>

                                <option>
                                    E-Wallet
                                </option>

                                <option>
                                    COD
                                </option>

                            </select>

                        </div>

                        <button class="btn btn-primary w-100 py-2">

                            Bayar Sekarang

                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection
