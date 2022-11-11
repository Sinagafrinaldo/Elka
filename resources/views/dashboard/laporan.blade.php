<link rel="shortcut icon" href="/assets/images/icon.svg" type="image/x-icon">
<title>{{ $title }} || Elka Farma</title>
@extends('layouts._dashboard.app')

@section('content')
    <div class="mx-3 mx-sm-4 mt-2">
        <div class="d-flex flex-column flex-sm-row mb-3">
            <div>
                <div class="d-inline-flex">
                    <a href="" class="text-secondary fs-4 text-decoration-none">Laporan</a>
                    <i class="mt-2 mx-3 fa-solid fa-chevron-right text-dark"></i>
                    @yield('title')
                </div>
                <h6 class="fs-6 mt-1 mb-4 fw-normal">Laporan Penjualan Berdasarkan Barang Sisa</h6>
            </div>
            <div class="ms-auto mt-3">
                <button id="nota" class="btn btn-danger">
                    <i class="fa-solid fa-file-invoice me-2"></i>
                    Cetak
                </button>
            </div>
        </div>
    </div>

    <div class="mx-4 mx-sm-5">
        <div class="row py-3" style="background-color: #F7FAFD">
            @if ($title == 'Laporan Barang Sisa')
                <div class=" col-11 ">
                    <button id="tampilMinim" class="btn btn-dark ms-2 " style="float: right">Stok Minim</button>
                    <button onClick="window.location.reload();" class=" btn btn-primary ms-2 "
                        style=" float: right">Semua</button>
                </div>
            @else
                <div class="col-12 col-lg-10 d-flex justify-content-end">
                    <input id="tanggal1" name="date1" type="date" class="form-control w-auto">
                    <div class="fs-4 px-2 w-auto"> - </div>
                    <input id="tanggal2" name="date2" type="date" class="form-control w-auto">
                </div>
                <div class="col-12 col-md d-flex justify-content-end justify-content-lg-start m-2 m-lg-0">
                    <button id="tampil" class="btn btn-dark ms-2">Tampilkan</button>
                </div>
            @endif
        </div>
    </div>

    {{-- <div class="d-flex mx-4 py-3" style="background-color: #F7FAFD">
        @if ($title == 'Laporan Barang Sisa')
            <div class=" col-11 ">
                <button id="tampilMinim" class="btn btn-dark ms-2 " style="float: right">Stok Minim</button>
                <button onClick="window.location.reload();" class=" btn btn-primary ms-2 "
                    style=" float: right">Semua</button>
            </div>
        @else
            <div class="d-flex col-7 ms-auto">
                <input id="tanggal1" name="date1" type="date" class="form-control">
                <div class="fs-4 px-2"> - </div>
                <input id="tanggal2" name="date2" type="date" class="form-control">
                <button id="tampil" class="btn btn-dark ms-2">Tampilkan</button>
            </div>
        @endif
    </div> --}}
    <div class="mx-3 mx-sm-4 pt-3">
        @yield('table')
    </div>
@endsection
