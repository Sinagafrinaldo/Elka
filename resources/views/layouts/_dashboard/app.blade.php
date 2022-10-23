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
        <div class="border-end" id="sidebar-wrapper" style="background-color: #283342; ">
            <div class="sidebar-heading bg-dark">
                <a href="
                    {{ route('admin.home') }}" class="text-decoration-none d-flex">
                    <img src="/assets/logo.png" width="40px" height="40px">
                    <h5 style="height: 40px" class="font-weight-bold text-white d-flex align-items-center ms-2">Elka
                        Farma</h5>
                </a>
            </div>
            <div class="sidebar-heading bg-transparent d-flex align-items-center">
                <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(10).webp" class="rounded-3"
                    style="width: 50px;" alt="Avatar" />
                <div class=" d-block ps-2 text-white">
                    <h6>
                        {{ Auth::guard('adminMiddle')->user()->name }}
                    </h6>
                    <h6 style="color: #FED600">
                        Admin / Staff
                    </h6>
                </div>
                <a href="#" class="ms-auto text-white" role="button" data-bs-toggle="dropdown">
                    <i class="fa fa-ellipsis-vertical"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item text-red" href="{{ route('admin.logout') }}">{{ _('Logout') }}</a>
                </div>
            </div>
            <div class="list-group list-group-flush">
                <a class="list-group-item list-group-item-action text-white p-3 d-flex"
                    href="
                    {{ route('admin.home') }}"
                    style="background-color: {{ $title === 'dashboard' ? '#009099' : 'transparent' }}">
                    <i class="fa-solid fa-house"></i>
                    Dashboard
                </a>

                <a class="list-group-item list-group-item-action text-white bg-transparent p-3 d-flex "
                    data-bs-toggle="collapse" href="#inventorySubmenu" role="button" aria-expanded="false"
                    aria-controls="inventorySubmenu">
                    <i class="fa-regular fa-calendar-plus"></i>
                    Inventory
                    <i class="fa-solid fa-chevron-down ms-auto fs-6 me-0" style="width: auto"></i>
                </a>
                <ul class="collapse list-unstyled {{ Str::limit($title, 9, '') === 'inventory' ? 'show' : '' }}"
                    id="inventorySubmenu">
                    <a class="list-group-item list-group-item-action text-white  p-3 ps-5"
                        style="background-color: {{ $title === 'inventory Daftar Obat' || $title === 'inventory Input Obat' ? '#009099' : 'transparent' }}"
                        href="{{ route('admin.daftarObat') }}">Daftar Obat</a>
                    <a class="list-group-item list-group-item-action text-white  p-3 ps-5"
                        style="background-color: {{ $title === 'inventory Input Transaksi' ? '#009099' : 'transparent' }}"
                        href="{{ route('admin.inputTransaksi') }}">Input Transaksi</a>
                </ul>

                <a class="list-group-item list-group-item-action text-white bg-transparent p-3 d-flex "
                    data-bs-toggle="collapse" href="#laporanSubmenu" role="button" aria-expanded="false"
                    aria-controls="laporanSubmenu">
                    <i class="fa-solid fa-chart-line"></i>
                    <div>
                        Laporan
                    </div>
                    <i class="fa-solid fa-chevron-down ms-auto fs-6 me-0" style="width: auto"></i>
                </a>
                <ul class="collapse list-unstyled {{ Str::limit($title, 7, '') === 'Laporan' ? 'show' : '' }} "
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

                <a class="list-group-item list-group-item-action text-white p-3 d-flex"
                    href="
                    {{ route('admin.kadaluarsa') }}"
                    style="background-color: {{ $title === 'kadaluarsa' ? '#009099' : 'transparent' }}">
                    <i class="fa-solid fa-sliders"></i>
                    Kadaluarsa
                </a>
                <div class="text-white mx-3 p-2 d-flex justify-content-center"
                    style="background-color: #455162; margin-top: 150px;">
                    Website
                </div>

            </div>
        </div>
        <!-- Page content wrapper-->
        <div id="page-content-wrapper">
            <!-- Top navigation-->
            <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom ">
                <button class="btn btn-light" id="sidebarToggle"><i class="fa-solid fa-bars"></i></button>
                <div class="container-fluid brv">

                    <div class="ms-auto">
                        <div class="d-flex">
                            @if (now('Asia/Jakarta')->format('a') == 'am')
                                <div class="d-flex align-items-center">
                                    <i class="rounded-circle bg-warning me-2" style="width: 15px; height: 15px"></i>
                                    <h6 class="mt-2">Selamat Pagi</h6>
                                </div>
                            @else
                                <div class="d-flex align-items-center">
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
    .list-group i {
        width: 30px;
        font-size: 16pt;
        margin-right: 5px;
    }

    .d-block h6 {
        font-size: 10pt;
    }

    .search {
        width: 50%;
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
