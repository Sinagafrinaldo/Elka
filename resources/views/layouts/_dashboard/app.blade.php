<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Dashboard</title>

    {{-- Icon --}}
    <script src="https://kit.fontawesome.com/0d1a099ae7.js" crossorigin="anonymous"></script>

    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />

    <!-- Core theme CSS (includes Bootstrap)-->
    <link href={{ asset('vendor/css/styles.css') }} rel="stylesheet" />

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,700;1,400&display=swap"
        rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>

</head>

<body style="background-color:#EDF1F5; ">
    <div class="d-flex" id="wrapper">
        <!-- Sidebar-->
        <div class="d-flex flex-column border-end" id="sidebar-wrapper" style="background-color: #283342; ">
            <div class="sidebar-heading bg-dark">
                <a href="
                    {{ route('admin.home') }}" class="text-decoration-none d-flex">
                    <img src="/assets/logo.png" width="40px" height="40px">
                    <h5 style="height: 40px" class="font-weight-bold text-white d-flex align-items-center ms-2">Elka
                        Farma</h5>
                </a>
            </div>
            <div class="sidebar-heading bg-transparent d-flex align-items-center px-2">
                <img src="/assets/fotoprofil.jpg" class="rounded-3" style="width: 50px;" alt="Avatar" />
                <div class=" d-block ps-2 text-white">
                    <h6>
                        {{ Auth::guard('adminMiddle')->user()->name }}
                    </h6>
                    <h6 style="color: #FED600">
                        Admin / Staff
                    </h6>
                </div>
                <a href="#" class="ms-auto text-white px-2" role="button" data-bs-toggle="dropdown">
                    <i class="fa fa-ellipsis-vertical"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-dark px-2" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item text-red bg-danger rounded-2" href="{{ route('admin.logout') }}">{{
                        _('Logout') }}</a>
                </div>
            </div>
            <div class="list-group list-group-flush mb-3">
                <a class="list-group-item list-group-item-action text-white p-3 d-flex" href="
                    {{ route('admin.home') }}"
                    style="background-color: {{ $title === 'dashboard' ? '#009099' : 'transparent' }}">
                    <img src="/assets/icon-navbar/dashboard.png" class="icon-navbar">
                    Dashboard
                </a>

                <a class="list-group-item list-group-item-action text-white bg-transparent p-3 d-flex accordion-button collapsed"
                    data-bs-toggle="collapse" href="#inventorySubmenu" role="button" aria-expanded="false"
                    aria-controls="inventorySubmenu">
                    <img src="/assets/icon-navbar/inventory.png" class="icon-navbar">
                    Inventory
                </a>
                <ul class="collapse list-unstyled {{ substr($title, -4) === 'Obat' || $title === 'Input Transaksi' ? 'show' : '' }}"
                    id="inventorySubmenu">
                    <a class="list-group-item list-group-item-action text-white  p-3 ps-5"
                        style="background-color: {{ substr($title, -4) === 'Obat' ? '#009099' : 'transparent' }}"
                        href="{{ route('admin.daftarObat') }}">Daftar Produk</a>
                    <a class="list-group-item list-group-item-action text-white  p-3 ps-5"
                        style="background-color: {{ $title === 'Input Transaksi' ? '#009099' : 'transparent' }}"
                        href="{{ route('admin.inputTransaksi') }}">Input Transaksi</a>
                </ul>

                <a class="list-group-item list-group-item-action text-white bg-transparent p-3 d-flex accordion-button collapsed"
                    data-bs-toggle="collapse" href="#laporanSubmenu" role="button" aria-expanded="false"
                    aria-controls="laporanSubmenu">
                    <img src="/assets/icon-navbar/lapor.png" class="icon-navbar">
                    Laporan
                </a>
                <ul class="collapse list-unstyled {{ substr($title, 0, 7) === 'Laporan' ? 'show' : '' }} "
                    id="laporanSubmenu">
                    <a class="list-group-item list-group-item-action text-white p-3 ps-5 "
                        style="background-color: {{ $title === 'Laporan Barang Masuk' ? '#009099' : 'transparent' }}"
                        href="{{ route('admin.laporan_barangmasuk') }}">Laporan Barang
                        Masuk</a>
                    <a class="list-group-item list-group-item-action text-white p-3 ps-5"
                        style="background-color: {{ $title === 'Laporan Barang Sisa' ? '#009099' : 'transparent' }}"
                        href="{{ route('admin.laporan_barangsisa') }}">Laporan Barang Sisa</a>
                    <a class="list-group-item list-group-item-action text-white p-3 ps-5"
                        style="background-color: {{ $title === 'Laporan Penjualan' ? '#009099' : 'transparent' }}"
                        href="{{ route('admin.laporan_penjualan') }}">Laporan Penjualan</a>
                    <a class="list-group-item list-group-item-action text-white p-3 ps-5"
                        style="background-color: {{ $title === 'Laporan Pemasukan' ? '#009099' : 'transparent' }}"
                        href="{{ route('admin.laporan_pemasukan') }}">Laporan Pemasukan</a>
                </ul>

                <a class="list-group-item list-group-item-action text-white p-3 d-flex" href="
                    {{ route('admin.kadaluarsa') }}"
                    style="background-color: {{ $title === 'Kadaluarsa' ? '#009099' : 'transparent' }}">
                    <img src="/assets/icon-navbar/kadaluarsa.png" class="icon-navbar">
                    Kadaluarsa
                </a>

                <a class="list-group-item list-group-item-action text-white p-3 d-flex" href="
                    {{ route('admin.kategori') }}"
                    style="background-color: {{ substr($title, -8) === 'Kategori' ? '#009099' : 'transparent' }}">
                    <img src="/assets/icon-navbar/kategori.png" class="icon-navbar">
                    Kategori
                </a>
                <a class="list-group-item list-group-item-action text-white p-3 d-flex" href="
                    {{ route('admin.suplier') }}"
                    style="background-color: {{ substr($title, -8) === 'Supliers' || $title === 'Input Suplier' || $title === 'Edit Suplier'  ? '#009099' : 'transparent' }}">
                    <img src="/assets/icon-navbar/kategori.png" class="icon-navbar">
                    Supliers
                </a>
            </div>
            <a href="/" target="_blank" class="text-white mt-auto mb-3 mx-3 p-2 d-flex justify-content-center"
                style="background-color: #455162; margin-top: 150px; text-decoration: none;">
                Website
            </a>
        </div>
        <!-- Page content wrapper-->
        <div id="page-content-wrapper">
            <!-- Top navigation-->
            <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom ">
                <button class="btn btn-light d-lg-none d-md-none " id="sidebarToggle"><i
                        class="fa-solid fa-bars"></i></button>
                <div class="container-fluid brv">
                    <?php
                    $today = now('Asia/Jakarta')->format('H:i');
                    ?>

                    <div class="ms-auto">
                        <div class="d-flex">
                            @if ($today > '04:00' && $today < '12:00' ) <div class="d-flex align-items-center ms-auto">
                                <i class="rounded-circle bg-warning me-2" style="width: 15px; height: 15px"></i>
                                <h6 class="mt-2">Selamat Pagi</h6>
                        </div>
                        @elseif ($today > '12:00' && $today < '15:00' ) <div class="d-flex align-items-center ms-auto">
                            <i class="rounded-circle bg-info me-2" style="width: 15px; height: 15px"></i>
                            <h6 class="mt-2">Selamat Siang</h6>
                    </div>
                    @elseif ($today > '15:00' && $today < '18:00' ) <div class="d-flex align-items-center ms-auto">
                        <i class="rounded-circle bg-primary me-2" style="width: 15px; height: 15px"></i>
                        <h6 class="mt-2">Selamat Sore</h6>
                </div>
                @else
                <div class="d-flex align-items-center ms-auto">
                    <i class="rounded-circle bg-dark me-2" style="width: 15px; height: 15px"></i>
                    <h6 class="mt-2">Selamat Malam</h6>
                </div>
                @endif
        </div>
        <div style="font-size: 11pt">
            {{ now('Asia/Jakarta')->format('d F Y H:i') }}
        </div>
    </div>
    </div>
    </nav>

    <!-- Page content-->
    <div style="width:100%">
        @yield('content')
    </div>
    </div>
    </div>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="{{ asset('vendor/js/scripts.js') }}"></script>
    <script src="js/scripts.js"></script>
</body>

</html>

<style>
    .list-group {
        font-size: 11pt;
    }

    .list-group img {
        width: 20px;
        height: 19px;
        margin-right: 10px;
    }

    .d-block h6 {
        font-size: 10pt;
    }

    .search {
        width: 50%;
    }

    .accordion-button::after {
        filter: brightness(0%) invert(100%)
    }

    .accordion-button:focus {
        box-shadow: inherit;
        border: 0;
    }



    @media (max-width: 850px) {
        .search {
            width: 100%;
        }

        .brv {
            flex-direction: column-reverse;
        }
    }
</style>