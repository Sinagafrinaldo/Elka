@extends('layouts._dashboard.app')

<title>Edit Obat || Elka Farma</title>

@section('content')
    <div class="mx-4 mt-2">
        <div class="d-flex">
            <a href="{{ route('admin.daftarObat') }}" class="text-decoration-none text-secondary fs-4">Inventory</a>
            <i class="mt-2 mx-3 fa-solid fa-chevron-right text-dark"></i>
            <a href="{{ route('admin.daftarObat') }}" class="text-decoration-none text-secondary fs-4">Daftar Obat</a>
            <i class="mt-2 mx-3 fa-solid fa-chevron-right text-dark"></i>
            <a href="" class="text-decoration-none text-dark fw-bold fs-4">Update Obat</a>
        </div>
        <h6 class="fs-6 mt-1 mb-4">*Semua kolom wajib diisi.</h6>

        {{-- Tambah --}}
        @foreach ($barang as $b)
            <form action="/admin/input-obat/store" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row mb-3">
                    <div class="col">
                        <div class="fs-6 mb-1">Nama Obat</div>
                        <input value="{{ $b->nama }}" name="nama" type="text" class="bg-light form-control">
                    </div>
                    <div class="col">
                        <div class="fs-6 mb-1">Jumlah</div>
                        <input value="{{ $b->sisa }}" name="jumlah" type="text" class="bg-light form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <div class="fs-6 mb-1">Jenis Obat</div>
                        <select name="kategori" class="form-select bg-light" aria-label="Default select example"
                            value="{{ $b->kategori }}">
                            <option value="" @if ($b->kategori == 'one') ? selected : null @endif>one</option>
                            <option value="TA" @if ($b->kategori == 'two') ? selected : null @endif>two</option>
                            <option value="ITA" @if ($b->kategori == 'three') ? selected : null @endif>three</option>
                        </select>
                    </div>
                    <div class="col d-lg-flex">
                        <div class="col me-lg-3">
                            <div class="fs-6 mb-1">Stock Minimal</div>
                            <input value="{{ $b->minimal }}" name="minimal" type="text" class="bg-light form-control">
                        </div>
                        <div class="col">
                            <div class="fs-6 mb-1">Stok Maksimal</div>
                            <input value="{{ $b->maksimal }}" name="maksimal" type="text" class="bg-light form-control">
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <div class="fs-6 mb-1">Tanggal Kadaluarsa</div>
                        <input value="{{ $b->kadaluarsa }}" name="kadaluarsa" type="date" class="form-control">
                    </div>
                    <div class="col"></div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <div class="fs-6 mb-1">Deskripsi</div>
                        <textarea name="deskripsi" id="konten" class="form-control" name="konten" rows="10" cols="50">{{ $b->deskripsi }}</textarea>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-lg-6">
                        <div class="fs-6 mb-1">Upload Gambar</div>
                        <div class="d-flex custom-file-button">
                            <label class="input-group-text bg-primary text-light px-4" for="inputGroupFile">Choose
                                File</label>
                            <input name="image" type="file" class="form-control border-0 bg-transparent"
                                id="inputGroupFile">
                        </div>
                        <img src="/uploads/{{ $b->image }}" class="py-3" style="width: 200">
                    </div>
                </div>

                <input type="submit" class="btn btn-danger mb-5" value="Update Obat">

            </form>
        @endforeach
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
