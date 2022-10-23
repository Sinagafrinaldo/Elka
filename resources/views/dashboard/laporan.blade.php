<link rel="shortcut icon" href="/assets/images/icon.svg" type="image/x-icon">
<title>{{ $title }} || Elka Farma</title>
@extends('layouts._dashboard.app')

@section('content')
    <div class="mx-4 mt-2">
        <div class="d-flex mb-3">
            <div>
                <div class="d-inline-flex">
                    <h4 class="text-secondary">Laporan</h4>
                    <i class="d-flex align-items-center mx-3 fa-solid fa-chevron-right text-dark"></i>
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
        <div class="d-flex col-6 justify-content-between ms-auto">
            <input type="text">
            -
            <input type="text">
            <button class="btn btn-dark">Tampilkan</button>
        </div>
    </div>
    <div class="mx-4 pt-3">
        @yield('table')
    </div>
@endsection
