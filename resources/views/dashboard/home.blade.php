<link rel="shortcut icon" href="/assets/images/icon.svg" type="image/x-icon">
<title>Dashboard Admin || Elka Farma</title>
@extends('layouts._dashboard.app')

@section('content')
<div class="container-fluid" style="width: 98%">
    <div class="d-flex mb-3">
        <div>
            <h4 class="mt-1">Dashboard</h4>
            <span class="fst-normal">Halaman Dashboard Admin</span>
        </div>
        <div class="ms-auto mt-3">
            <a href="{{ route('admin.inputTransaksi') }}" class="btn btn-danger">
                <i class="fa-solid fa-plus"></i>
                Transakasi</a>
        </div>
    </div>

    <div class="container pb-3">
        <div class="row justify-content-center">
            {{-- Pendapatan --}}
            <div class="col-lg col-md-5 col-sm-5 m-2 px-0 bg-white d-flex flex-column justify-content-between"
                style="border: solid 1px #FED600; border-radius: 6px;">
                <div class="d-block text-center px-3 pt-2">
                    <img src="/assets/icon-dashboard/money.png" width="40px" height="40px" />
                    <div class="fs-5 mt-2">Rp. 2.240.000,-</div>
                    <div class="row mb-2">
                        <div class="col-5">
                            <h6 class="my-2">Pendapatan: </h6>
                        </div>
                        <div class="col">
                            <select class="form-select form-select-sm border-0" aria-label=".form-select-sm example">
                                <option value="1">Jan 2022</option>
                                <option value="2">Feb 2022</option>
                                <option value="3">Mar 2022</option>
                                <option value="1">Apr 2022</option>
                                <option value="2">Mei 2022</option>
                                <option value="3">Jun 2022</option>
                                <option value="1">Jul 2022</option>
                                <option value="2">Aug 2022</option>
                                <option value="3">Sep 2022</option>
                                <option value="1">Okt 2022</option>
                                <option value="2">Nov 2022</option>
                                <option value="3">Des 2022</option>
                            </select>
                        </div>
                    </div>
                </div>
                <a href="{{ route('admin.laporan_penjualan') }}"
                    class="d-flex p-2 badge text-dark justify-content-center align-items-stretch text-decoration-none"
                    style="background-color: rgba(254, 214, 0, 0.3)">
                    Lihat Detail Laporan
                    <i class="fa-solid fa-angles-right ms-2"></i>
                </a>
            </div>

            {{-- inventory --}}
            <div class="col-lg m-2 col-md-5 col-sm-5 px-0 bg-white d-flex flex-column justify-content-between"
                style="border: solid 1px #03A9F5; border-radius: 6px;">
                <div class="d-block text-center px-3 pt-2">
                    <img src="/assets/icon-dashboard/medical.png" width="40px" height="40px" />
                    <div class="fs-5 mt-2">{{$jumlah}}</div>
                    <div class="d-flex mb-2 justify-content-center">
                        <h6 class="me-2 my-2">Obat Tersedia </h6>
                    </div>
                </div>
                <a href="{{ route('admin.daftarObat') }}"
                    class="d-flex p-2 badge text-dark justify-content-center text-decoration-none"
                    style="background-color: rgba(3, 169, 245, 0.3)">
                    Lihat Inventory
                    <i class="fa-solid fa-angles-right ms-2"></i>
                </a>
            </div>

            {{-- kadaluarsa --}}
            <div class="col-lg m-2 col-md-5 col-sm-5 px-0 bg-white d-flex flex-column justify-content-between"
                style="border: solid 1px #01A768; border-radius: 6px;">
                <div class="d-block text-center px-3 pt-2">
                    <img src="/assets/icon-dashboard/plus_P.png" width="40px" height="40px" />
                    <div class="fs-5 mt-2">01 Obat</div>
                    <div class="d-flex mb-2 justify-content-center">
                        <h6 class="me-2 my-2">Obat Kadaluarsa </h6>
                    </div>
                </div>
                <a href="{{ route('admin.kadaluarsa') }}"
                    class="d-flex p-2 badge text-dark justify-content-center text-decoration-none"
                    style="background-color: rgba(1, 167, 104, 0.3)">
                    Lihat Detail
                    <i class="fa-solid fa-angles-right ms-2"></i>
                </a>
            </div>

            {{-- kurang stok --}}
            <div class="col-lg m-2 col-md-5 col-sm-5 px-0 bg-white d-flex flex-column justify-content-between"
                style="border: solid 1px #F0483E; border-radius: 6px;">
                <div class="d-block text-center px-3 pt-2">
                    <img src="/assets/icon-dashboard/danger.png" width="40px" height="40px" />
                    <div class="fs-5 mt-2">02 Obat</div>
                    <div class="d-flex mb-2 justify-content-center">
                        <h6 class="me-2 my-2">Kekurangan Stok</h6>
                    </div>
                </div>
                <a href="{{ route('admin.daftarObat') }}"
                    class="d-flex p-2 badge text-dark justify-content-center text-decoration-none"
                    style="background-color: rgba(240, 72, 62, 0.3)">
                    Lihat Detail
                    <i class="fa-solid fa-angles-right ms-2"></i>
                </a>
            </div>
        </div>
    </div>


</div>

<div class="p-4 bg-white">
    <div class="row justify-content-center">
        <div class="col-lg-5 col-md-11 col-sm-9 m-2 p-0">
            {{-- Inventory --}}
            <div class="col border border-2 mb-3">
                <div class="d-flex p-3 py-2">
                    <h6>Inventory</h6>
                    <a href="{{ route('admin.daftarObat') }}"
                        class="d-flex ms-auto badge text-dark text-decoration-none align-items-center">
                        <span>Lihat Selengkapnya</span>
                        <i class="fa-solid fa-angles-right ms-2"></i>
                    </a>
                </div>
                <div class="row border-top border-2 p-3 px-5">
                    <div class="col">
                        <h5 class="fw-bolder">{{$jumlah}}</h5>
                        <span>Jumlah Obat</span>
                    </div>
                    <div class="col">
                        <h5 class="fw-bolder">{{$kategori}}</h5>
                        <span>Kategori</span>
                    </div>
                </div>
            </div>

            {{-- Pembeli --}}
            <div class="col border border-2 mb-3">
                <div class="d-flex p-3 py-2">
                    <h6>Pembeli</h6>
                    <a href="{{ route('admin.laporan_penjualan') }}"
                        class="d-flex ms-auto badge text-dark text-decoration-none align-items-center">
                        <span>Lihat Laporan Penjualan</span>
                        <i class="fa-solid fa-angles-right ms-2"></i>
                    </a>
                </div>
                <div class="row border-top border-2 p-3 px-5">
                    <div class="col">
                        <h5 class="fw-bolder">845</h5>
                        <span>Jumlah Pembeli</span>
                    </div>
                    <div class="col">
                        <h5 class="fw-bolder">Rp. 2.240.000</h5>
                        <span>Pendapatan</span>
                    </div>
                </div>
            </div>

        </div>
        {{-- Penjualan Bulanan --}}
        <div class="col-lg-6 col-md-11 col-sm-9 border border-2 m-2 p-0">
            <div class="d-flex p-3 py-2 border-bottom border-2">
                <h6 class="w-100">Penjualanan Bulanan</h6>
                <select class="form-select form-select-sm border-0" aria-label=".form-select-sm example">
                    <option value="1">Jan 2022</option>
                    <option value="2">Feb 2022</option>
                    <option value="3">Mar 2022</option>
                    <option value="1">Apr 2022</option>
                    <option value="2">Mei 2022</option>
                    <option value="3">Jun 2022</option>
                    <option value="1">Jul 2022</option>
                    <option value="2">Aug 2022</option>
                    <option value="3">Sep 2022</option>
                    <option value="1">Okt 2022</option>
                    <option value="2">Nov 2022</option>
                    <option value="3">Des 2022</option>
                </select>

            </div>
        </div>
    </div>
</div>

<style>
    .form-select {
        cursor: pointer;
    }

    h6 {
        font-weight: bold;
    }
</style>
@endsection