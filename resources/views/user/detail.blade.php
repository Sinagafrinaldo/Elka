@extends('user.navbar')

@section('content')
    <div class="container mt-5 px-3 px-md-5">
        <div class="card p-3 p-sm-5 shadow">

            @foreach ($barang as $b)
                <div class="row d-column text-center">
                    <h3>{{ $b->nama }}</h3>
                    <hr>
                </div>
                <div class="row justify-content-center text-center mb-3">
                    <img src="/uploads/{{ $b->image }}" class="img-fluid" style="width: 300px" alt="...">
                    <h5>Harga : <span class="text-primary"> Rp. {{ $b->harga }},- </span> </h5>
                </div>
                <div class="row" style="text-align: justify">
                    {!! $b->deskripsi !!}
                </div>
                <div class="row">
                    <div class="w-auto" style="margin-right: 150px">
                        <h6 class="fw-bold">Kategori</h6>
                        <p>
                            <li>{{ $b->kategori }}</li>
                        </p>
                    </div>
                    <div class="w-auto">
                        <h6 class="fw-bold">Sisa Barang</h6>
                        <p>
                            <li>{{ $b->sisa }}</li>
                        </p>
                    </div>
                </div>
            @endforeach

        </div>
        @include('user.rekomendasi')
    </div>

    <style>
        body {
            background-color: #F6F6F6;
        }
    </style>
@endsection
