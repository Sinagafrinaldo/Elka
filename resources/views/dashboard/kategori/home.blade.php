<title>Kategori || Elka Farma</title>
@extends('layouts._dashboard.app')

@section('content')
    <div class="mx-4 mt-2">
        <div class="d-flex mb-3">
            <div>
                <div class="d-inline-flex">
                    <a href="{{ route('admin.kategori') }}" class="text-decoration-none text-dark fw-bold fs-4">Kategori</a>
                </div>
                <h6 class="fs-6 mt-1 mb-4 fw-normal">Halaman Pengelolaan Kategori</h6>
            </div>
            <div class="ms-auto mt-3">
                <a href="{{ route('admin.inputKategori') }}" class="btn btn-danger">
                    <i class="fa-solid fa-plus"></i>
                    Tambah Kategori</a>
            </div>
        </div>
    </div>
    <div class="mx-4">

        {{-- Table --}}
        <?php $a = 1; ?>
        <div class="row mt-3 mx-1 p-2 bg-white">

            <table class="table table-hover table-responsive text-center" style="color: #656a6e">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Kategori</th>
                        <th scope="col">Aksi</th>

                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Obat Batuk </td>
                        <td>
                            <a href=" {{ route('admin.editKategori') }} " class="btn btn-primary btn-sm">
                                <i class="fa-solid fa-pen text-light"></i>
                            </a>
                            <a class="btn btn-danger btn-sm">
                                <i class="fa-solid fa-trash-can text-light"></i>
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>
@endsection
