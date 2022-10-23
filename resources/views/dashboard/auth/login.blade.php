<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="/assets/images/icon.svg" type="image/x-icon">
    <title>Login Admin || Elka Farma</title>
    <link rel="stylesheet" href="{{ asset('vendor/css/styles.css') }}">
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body>
    <section class="vh-100" style="background-color: #EDF1F5;">

        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card text-white shadow-lg border-0 rounded-lg mt-5"
                                style="background-color: #283342">
                                <div class="card-header border-0">
                                    <h3 class="text-center font-weight-700 my-4">LOGIN</h3>
                                </div>
                                <div class="card-body">
                                    @if (Session::has('success'))
                                        <div class="alert alert-success" role="alert"
                                            style="background-color: #5ee96c">
                                            {{ Session::get('success') }}
                                        </div>
                                    @endif
                                    <form method="POST" action="{{ route('admin.login') }}" novalidate>
                                        @csrf
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputEmailAddress">Email</label>
                                            <input class="form-control py-4 @error('email') is-invalid @enderror"
                                                id="inputEmailAddress" type="email" placeholder="Isi email"
                                                name="email" value="{{ old('email') }}" />
                                            @error('email')
                                                <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputPassword">Password</label>
                                            <input class="form-control py-4 @error('email') is-invalid @enderror"
                                                id="inputPassword" type="password" placeholder="Isi password"
                                                name="password" />
                                            @error('password')
                                                <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                        <div
                                            class="form-group d-flex align-items-center justify-content-center mt-4 mb-0">
                                            <button type="submit" class="btn btn-primary">{{ __('Login') }}</button>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </section>
</body>

</html>
