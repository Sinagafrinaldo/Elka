<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Elka Farma | {{ $title }}</title>

    <script src="https://kit.fontawesome.com/0d1a099ae7.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    {{-- Icon --}}
    <script src="https://kit.fontawesome.com/0d1a099ae7.js" crossorigin="anonymous"></script>

</head>

<body>
    {{-- NAVBAR --}}
    <nav class="navbar navbar-dark bg-dark navbar-expand-lg sticky-top">
        <div class="container">
            <a class="navbar-brand" href="#">Apotek Elka Farma </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ $title === 'Home' ? 'active' : '' }}" aria-current="page"
                            href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ $title === 'Cek Stok Obat' || $title === 'Detail' ? 'active' : '' }}"
                            href="/cek-stok">Daftar
                            Obat</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ $title === 'Kategori' || str_contains($title, 'Detail Kategori') ? 'active' : '' }}"
                            href="/kategori-barang">Kategori
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ $title === 'Tentang Kami' ? 'active' : '' }}" href="/tentang-kami">Tentang
                            Kami</a>
                    </li>
                    <li class="nav-item">
                        <a href="/admin" class="btn btn-primary ms-lg-3">LOGIN</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    @yield('content')


    @include('user.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>
</body>

</html>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700&display=swap');

    .navbar-brand {
        font-weight: 700;
        font-size: 22px;
        font-family: "Barlow", sans-serif;
    }

    .nav-link {
        font-family: "Barlow", sans-serif;
        font-weight: 500;
    }

    .btn {
        padding: 6px 26px;
    }
</style>

@yield('style')
