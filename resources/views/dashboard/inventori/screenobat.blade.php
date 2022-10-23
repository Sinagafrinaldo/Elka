@extends('layouts._dashboard.app')

<title>{{ $title }}</title>

@section('content')
    <div class="mx-4 mt-2">
        <div class="d-inline-flex">
            <h4 class="text-secondary">Inventory</h4>
            <i class="d-flex align-items-center mx-3 fa-solid fa-chevron-right text-dark"></i>
            <h4 class="text-secondary">Daftar Obat</h4>
            <i class="d-flex align-items-center mx-3 fa-solid fa-chevron-right text-dark"></i>
            <h4 class="text-dark fw-bold">Tambah Obat</h4>
        </div>
        <h6 class="fs-6 mt-1 mb-4">*Semua kolom wajib diisi.</h6>

        {{-- Tambah --}}
        <form action="/admin/input-obat/store" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="row mb-3">
                <div class="col">
                    <div class="fs-6 mb-1">Nama Obat</div>
                    <input name="nama" type="text" class="bg-light form-control">
                </div>
                <div class="col">
                    <div class="fs-6 mb-1">Jumlah</div>
                    <input name="jumlah" type="text" class="bg-light form-control">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <div class="fs-6 mb-1">Jenis Obat</div>
                    <select name="kategori" class="form-select bg-light" aria-label="Default select example">
                        <option selected>Open this select menu</option>
                        <option value="one" name="one">One</option>
                        <option value="two" name="two">Two</option>
                        <option value="three" name="three">Three</option>
                    </select>
                </div>
                <div class="col d-lg-flex">
                    <div class="col me-lg-3">
                        <div class="fs-6 mb-1">Stock Minimal</div>
                        <input name="minimal" type="text" class="bg-light form-control">
                    </div>
                    <div class="col">
                        <div class="fs-6 mb-1">Stok Maksimal</div>
                        <input name="maksimal" type="text" class="bg-light form-control">
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <div class="fs-6 mb-1">Tanggal Kadaluarsa</div>
                    <input name="kadaluarsa" type="date" class="form-control">
                </div>
                <div class="col"></div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <div class="fs-6 mb-1">Deskripsi</div>
                    <textarea name="deskripsi" id="konten" class="form-control" name="konten" rows="10" cols="50"></textarea>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-lg-6">
                    <div class="fs-6 mb-1">Upload Gambar</div>
                    <div class="d-flex custom-file-button">
                        <label class="input-group-text bg-primary text-light px-4" for="inputGroupFile">Choose File</label>
                        <input name="image" type="file" class="form-control border-0 bg-transparent"
                            id="inputGroupFile">
                    </div>
                </div>
            </div>

            <input type="submit" class="btn btn-danger mb-5" value="Tambah Obat">

        </form>
    </div>


    <style>
        .custom-file-button input[type=file] {
            margin-left: -2px !important;
        }

        .custom-file-button input[type=file]::-webkit-file-upload-button {
            display: none;
        }

        .custom-file-button input[type=file]::file-selector-button {
            display: none;
        }

        .custom-file-button:hover label {
            cursor: pointer;
        }
    </style>
    <script src="{{ asset('assets/ckeditor/ckeditor.js') }}"></script>
    <script>
        var konten = document.getElementById("konten");
        CKEDITOR.replace(konten, {
            language: 'en-gb'
        });
        CKEDITOR.config.allowedContent = true;
    </script>
@endsection
