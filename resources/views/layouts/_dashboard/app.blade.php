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

    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />

    <!-- Core theme CSS (includes Bootstrap)-->
    <link href={{ asset('vendor/css/styles.css') }} rel="stylesheet" />

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
</head>

<body style="background-color:#F6F6F6; ">
    <div class="d-flex" id="wrapper">
        <!-- Sidebar-->
        <div class="border-end " id="sidebar-wrapper" style="background-color: #1c70bd; ">
            <div class="sidebar-heading border-bottom bg-light" style="border: 1px solid #1c70bd;">
                <a href="
                    {{ route('admin.home') }}">
                    <img src="/assets/images/logo.svg" width="185px" height="40px">
                </a>
            </div>


            <div class="list-group list-group-flush" >
                <a class="list-group-item list-group-item-action text-white  p-3" href="
                    {{ route('admin.home') }}" style="background-color: #1c70bd">
                    Dashboard
                </a>
                <a class="list-group-item list-group-item-action text-white p-3" href="{{ route('admin.inventory') }}"
                    style="background-color: #1c70bd">
                    Inventory
                </a>
                <a class="list-group-item list-group-item-action text-white p-3"
                    href="{{ route('admin.laporan') }}" style="background-color: #1c70bd">
                    Laporan
                </a>
                <a class="list-group-item list-group-item-action text-white p-3"
                    href="{{ route('admin.kadaluarsa') }}" style="background-color: #1c70bd">
                    Barang Kadaluarsa
                </a>

            </div>
        </div>
        <!-- Page content wrapper-->
        <div id="page-content-wrapper">
            <!-- Top navigation-->
            <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                <div class="container-fluid">
                    <button class="btn btn-primary" id="sidebarToggle">Toggle Menu</button>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation"><span
                            class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mt-2 mt-lg-0">

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ Auth::guard('adminMiddle')->user()->name }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item"
                                        href="{{ route('admin.logout') }}">{{ _('Logout') }}</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <!-- Page content-->
            <div class="container-fluid" style="width:98%">
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
