<title>Input Suplier || Elka Farma</title>
@extends('layouts._dashboard.app')

@section('content')
<div class="mx-3 mx-sm-4 mt-2">

    <div class="d-inline-flex">
        <a href="{{ route('admin.suplier') }}" class="text-decoration-none text-secondary fs-4">Suplier</a>
        <i class="mt-2 mx-3 fa-solid fa-chevron-right text-dark"></i>
        <a href="{{ route('admin.inputSuplier') }}" class="text-decoration-none text-dark fw-bold fs-4">Tambah
            Suplier</a>
    </div>
    <h6 class="fs-6 mt-1 mb-4 fw-normal">Halaman Pengelolaan Suplier</h6>

    {{-- Tambah Suplier --}}

    <form action="/admin/input-suplier/store" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="col-12 col-sm-6 mb-3">
            <div class="fs-6 mb-1">Nama Suplier</div>
            <input name="nama" type="text" class="bg-light form-control">
            @error('nama')
            <span class="text-danger">{{ $message }} </span>
            @enderror
        </div>

        <input type="submit" class="btn btn-danger mb-5 mt-3" value="Tambah Suplier">
    </form>
</div>



@endsection