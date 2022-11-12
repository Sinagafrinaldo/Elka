@extends('user.navbar')

@section('content')
    <div class="container my-5 ">
        <h4 class="d-flex justify-content-center fw-bold">KATEGORI</h4>
        <hr>
        <div class="row p-3">
            @foreach ($kategori as $k)
                <div class="col-6 col-lg p-2 d-flex justify-content-center">
                    <div class="card" style="width: 18rem;">
                        <div onClick="location.href='/list-kategori/{{ $k->slug }}'" style="cursor:pointer;"
                            class="card-body bg-dark d-flex justify-content-center">
                            <div class="card rounded-circle d-flex align-items-center py-3 py-sm-5 px-4">
                                <img src="/kategori/{{ $k->gambar }}" width="60" height="60">
                                <h5 class="card-title" style="text-align: center;">{{ $k->nama }}</h5>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <style>
        h5 {
            width: 150px;
        }

        @media(max-width: 400px) {
            h5 {
                font-size: 1rem;
            }
        }
    </style>
@endsection
