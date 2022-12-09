<title>Edit Suplier || Elka Farma</title>
@extends('layouts._dashboard.app')

@section('content')
<div class="mx-3 mx-sm-4 mt-2">
    @foreach ($suplier as $k)
    <div class="d-inline-flex">
        <a href="{{ route('admin.suplier') }}" class="text-decoration-none text-secondary fs-4">Suplier</a>
        <i class="mt-2 mx-3 fa-solid fa-chevron-right text-dark"></i>
        <a href="/admin/edit-suplier/{{ $k->id }}" class="text-decoration-none text-dark fw-bold fs-4">Edit
            Suplier</a>
    </div>
    <h6 class="fs-6 mt-1 mb-4 fw-normal">Halaman Pengelolaan Suplier</h6>

    {{-- Tambah Suplier --}}

    <form action="/admin/update-suplier" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="col-12 col-sm-6 mb-3">
            <div class="fs-6 mb-1">Nama Suplier</div>
            <input value="{{ $k->nama }}" name="nama" type="text" class="bg-light form-control">
        </div>

        <input type="text" name="id" hidden value="{{ $k->id }}">

        <input type="submit" class="btn btn-danger mb-5 mt-5" value="Update Suplier">
    </form>
    @endforeach
</div>


@endsection
