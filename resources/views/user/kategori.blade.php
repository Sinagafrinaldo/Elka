@extends('user.navbar')

@section('content')
    <div class="container my-5 ">
        <h4 class="d-flex justify-content-center fw-bold">KATEGORI</h4>
        <hr>
        <div class="row p-3 px-lg-5 ">
            @foreach ($kategori as $k)
                <div class="col-6 col-lg-4 p-2 d-flex justify-content-center">
                    <div class="card shadow py-lg-3 w-100">
                        <div onClick="location.href='/list-kategori/{{ $k->slug }}'" style="cursor:pointer;"
                            class="card-body d-flex flex-column flex-sm-row justify-content-center align-items-center">
                            <img src="/kategori/{{ $k->gambar }}" class="me-sm-3" width="50" height="50">
                            <h5 class="card-title pt-3 pt-sm-0" style="text-align: center;">{{ $k->nama }}</h5>
                        </div>
                    </div>
                </div>

                {{-- <div class="col-6 col-lg p-2 d-flex justify-content-center">
                    <div class="card" style="width: 18rem;">
                        <div onClick="location.href='/list-kategori/{{ $k->slug }}'" style="cursor:pointer;"
                            class="card-body bg-dark d-flex justify-content-center">
                            <div class="card rounded-circle d-flex align-items-center py-3 py-sm-5 px-4">
                                <img src="/kategori/{{ $k->gambar }}" width="60" height="60">
                                <h5 class="card-title" style="text-align: center;">{{ $k->nama }}</h5>
                            </div>
                        </div>
                    </div>
                </div> --}}
            @endforeach
        </div>
    </div>
    <style>
        /* h5 {
                                                    width: 150px;
                                                }

                                                @media(max-width: 400px) {
                                                    h5 {
                                                        font-size: 1rem;
                                                    }
                                                } */
        .card:hover {
            background-color: rgb(224, 225, 228);
        }
    </style>
@endsection
