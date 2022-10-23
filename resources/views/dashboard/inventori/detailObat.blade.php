@extends('layouts._dashboard.app')

<title>{{ $title }}</title>

@section('content')
<div class="mx-4 mt-2">
    <div class="d-inline-flex">
        <h4 class="text-secondary">Inventory</h4>
        <i class="d-flex align-items-center mx-3 fa-solid fa-chevron-right text-dark"></i>
        <h4 class="text-secondary">Daftar Obat</h4>
        <i class="d-flex align-items-center mx-3 fa-solid fa-chevron-right text-dark"></i>
        <h4 class="text-dark fw-bold">Detail</h4>
    </div>
    <h6 class="fs-6 mt-1 mb-4">*Semua kolom wajib diisi.</h6>

    {{-- Tambah --}}
    @foreach ($barang as $b)
    <div class="row mb-3">
        <div class="col">
            <div class="fs-6 mb-1">Nama Obat</div>
            <input value="{{$b->nama}}" style="background-color: #E3EBF3;" name="nama" type="text" class="form-control"
                disabled>
        </div>
        <div class="col">
            <div class="fs-6 mb-1">Jumlah</div>
            <input value="{{$b->sisa}}" style="background-color: #E3EBF3;" name="jumlah" type="text"
                class=" form-control" disabled>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col">
            <div class="fs-6 mb-1">Jenis Obat</div>
            <input value="{{$b->kategori}}" style="background-color: #E3EBF3;" name="kategori" type="text"
                class="form-control" disabled>
        </div>
        <div class="col d-lg-flex">
            <div class="col me-lg-3">
                <div class="fs-6 mb-1">Stock Minimal</div>
                <input value="{{$b->minimal}}" style="background-color: #E3EBF3;" name="minimal" type="text"
                    class="form-control" disabled>
            </div>
            <div class="col">
                <div class="fs-6 mb-1">Stok Maksimal</div>
                <input value="{{$b->maksimal}}" style="background-color: #E3EBF3;" name="maksimal" type="text"
                    class=" form-control" disabled>
            </div>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col">
            <div class="fs-6 mb-1">Tanggal Kadaluarsa</div>
            <input value="{{$b->kadaluarsa}}" style="background-color: #E3EBF3;" name="kadaluarsa" type="date"
                class="form-control" disabled>
        </div>
        <div class="col"></div>
    </div>
    <div class="row mb-3">
        <div class="col">
            <div class="fs-6 mb-1">Deskripsi</div>
            <textarea style="background-color: #E3EBF3;" name="deskripsi" id="konten" class="form-control" name="konten"
                rows="10" cols="50" disabled>{{$b->deskripsi}}</textarea>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-lg-6">
            <div class="fs-6 mb-1">Gambar</div>
            <img src="/uploads/{{ $b->image }}" style="width: 200">
        </div>
    </div>


    <a class="btn btn-danger mb-5" href="/admin/daftar-obat">Kembali</a>

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