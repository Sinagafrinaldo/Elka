<link rel="shortcut icon" href="/assets/images/icon.svg" type="image/x-icon">
<title>{{ $title }} || Elka Farma</title>
@extends('layouts._dashboard.app')

@section('content')
    <div class="mx-4 mt-2">
        <div class="d-flex mb-3">
            <div>
                <div class="d-inline-flex">
                    <a href="" class="text-secondary fs-4 text-decoration-none">Laporan</a>
                    <i class="mt-2 mx-3 fa-solid fa-chevron-right text-dark"></i>
                    @yield('title')
                </div>
                <h6 class="fs-6 mt-1 mb-4 fw-normal">Laporan Penjualan Berdasarkan Barang Sisa</h6>
            </div>
            <div class="ms-auto mt-3">
                <a href="" class="btn btn-danger">
                    <i class="fa-solid fa-file-invoice me-2"></i>
                    Cetak
                </a>
            </div>
        </div>
    </div>
    <div class="d-flex mx-4 py-3" style="background-color: #F7FAFD">
        <div class="d-flex col-7 ms-auto">
            <input name="date1" type="date" class="form-control" max="{{ now('Asia/Jakarta')->format('Y-m-d') }}">
            <div class="fs-4 px-2"> - </div>
            <input name="date2" type="date" class="form-control" max="{{ now('Asia/Jakarta')->format('Y-m-d') }}">
            <button class="btn btn-dark ms-2">Tampilkan</button>
        </div>
    </div>
    <div class="mx-4 pt-3">
        @yield('table')
    </div>
@endsection
