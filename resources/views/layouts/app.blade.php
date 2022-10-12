<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Scripts Bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,700;1,400&display=swap"
        rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
</head>

<body style="background-color:#F6F6F6">

    {{-- <main class="py-4"> --}}
    @yield('content')
    {{-- </main> --}}
    <footer class="text-center align-items-end">
        <footer style=" background:#1F76C6" class="text-center text-white">
            <!-- Grid container -->
            <div class="container p-4 pb-0">

                <section class="mb-4">

                    <i>Joy Ravelo Tarigan - 119140037 || </i>

                    <i>Frinaldo Sinaga - 119140064</i><br>
                    <i>Dodi Devrian Andrianto - 119140023 || </i>
                    <i>Hendamia Yohana Sembiring - 119140178 || </i>
                    <i>Fahriza Yusefa - 119140005 </i>


                </section>

            </div>

            <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
                Copyright © 2022 by
                <a class="text-white" href="#">PWL Project </a>
            </div>
            <!-- Copyright -->
        </footer>
    </footer>
</body>

</html>
