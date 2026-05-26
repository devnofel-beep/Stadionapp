@extends('layouts.app')

@section('content')

<div class="container py-5">

    <!-- HEADER -->
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h2 class="fw-bold mb-1">
                Tambah Event Baru
            </h2>

            <p class="text-muted mb-0">
                Isi data event stadion dengan lengkap
            </p>
        </div>

        <a href="/admin/dashboard"
           class="btn btn-outline-secondary">

            ← Kembali

        </a>

    </div>

    <!-- CARD -->
    <div class="card border-0 shadow-lg rounded-4">

        <!-- HEADER CARD -->
        <div class="card-header bg-primary text-white rounded-top-4 py-3">

            <h4 class="mb-0">
                Form Tambah Event
            </h4>

        </div>

        <!-- BODY -->
        <div class="card-body p-4">

            <form action="/admin/event/store"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf

                <div class="row">

                    <!-- NAMA EVENT -->
                    <div class="col-md-6 mb-4">

                        <label class="form-label fw-semibold">
                            Nama Event
                        </label>

                        <input type="text"
                               name="nama_event"
                               class="form-control form-control-lg"
                               placeholder="Contoh: Persipura vs Persija">

                    </div>

                    <!-- STATUS -->
                    <div class="col-md-6 mb-4">

                        <label class="form-label fw-semibold">
                            Status Event
                        </label>

                        <select name="status"
                                class="form-select form-select-lg">

                            <option value="aktif">
                                Aktif
                            </option>

                            <option value="selesai">
                                Selesai
                            </option>

                        </select>

                    </div>

                    <!-- TANGGAL -->
                    <div class="col-md-6 mb-4">

                        <label class="form-label fw-semibold">
                            Tanggal Event
                        </label>

                        <input type="date"
                               name="tanggal"
                               class="form-control form-control-lg">

                    </div>

                    <!-- JAM -->
                    <div class="col-md-6 mb-4">

                        <label class="form-label fw-semibold">
                            Jam Event
                        </label>

                        <input type="time"
                               name="jam"
                               class="form-control form-control-lg">

                    </div>

                    <!-- UPLOAD BANNER -->
                    <div class="col-12 mb-4">

                        <label class="form-label fw-semibold">
                            Upload Banner Event
                        </label>

                        <input type="file"
                               name="banner"
                               id="bannerInput"
                               class="form-control form-control-lg"
                               accept="image/*">

                        <small class="text-muted">
                            Pilih gambar banner event dari komputer
                        </small>

                    </div>

                    <!-- PREVIEW -->
                    <div class="col-12 mb-4 text-center">

                        <img id="previewBanner"
                             src=""
                             class="img-fluid rounded shadow"
                             style="max-height:300px; display:none;">

                    </div>

                    <!-- DESKRIPSI -->
                    <div class="col-12 mb-2">

                        <label class="form-label fw-semibold">
                            Deskripsi Event
                        </label>

                        <textarea name="deskripsi"
                                  id="deskripsiInput"
                                  class="form-control"
                                  rows="5"
                                  placeholder="Tulis deskripsi event..."></textarea>

                    </div>

                    <!-- COUNTER -->
                    <div class="col-12 mb-4">

                        <small id="charCount"
                               class="text-muted">

                            0 karakter

                        </small>

                    </div>

                </div>

                <!-- BUTTON -->
                <div class="d-flex justify-content-end gap-2 mt-3">

                    <button type="reset"
                            id="resetBtn"
                            class="btn btn-outline-danger px-4">

                        Reset

                    </button>

                    <button type="submit"
                            id="submitBtn"
                            class="btn btn-primary px-5">

                        Simpan Event

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection


@section('scripts')

<script>

// ============================
// PREVIEW BANNER
// ============================

const bannerInput =
    document.getElementById('bannerInput');

const previewBanner =
    document.getElementById('previewBanner');

bannerInput.addEventListener('change', function() {

    const file = this.files[0];

    if (file) {

        const reader = new FileReader();

        reader.onload = function(e) {

            previewBanner.src = e.target.result;

            previewBanner.style.display = 'block';

        }

        reader.readAsDataURL(file);

    }

});


// ============================
// CHARACTER COUNTER
// ============================

const deskripsiInput =
    document.getElementById('deskripsiInput');

const charCount =
    document.getElementById('charCount');

deskripsiInput.addEventListener('keyup', function() {

    charCount.innerHTML =
        this.value.length + ' karakter';

});


// ============================
// FORM VALIDATION
// ============================

const form =
    document.querySelector('form');

const submitBtn =
    document.getElementById('submitBtn');

form.addEventListener('submit', function(e) {

    let namaEvent =
        document.querySelector(
            'input[name="nama_event"]'
        ).value;

    if (namaEvent.trim() === '') {

        alert('Nama event wajib diisi!');

        e.preventDefault();

        return;

    }

    submitBtn.innerHTML = 'Menyimpan...';

    submitBtn.disabled = true;

});


// ============================
// RESET CONFIRMATION
// ============================

const resetBtn =
    document.getElementById('resetBtn');

resetBtn.addEventListener('click', function(e) {

    let confirmReset = confirm(
        'Yakin ingin menghapus isi form?'
    );

    if (!confirmReset) {

        e.preventDefault();

    }

});

</script>

@endsection
