@extends('user.navbar')

@section('content')
<div class="container py-5">
    <div class="container d-flex mb-3">
        <form action="/cari" method="GET" class="d-flex ms-auto w-50" role="search">
            <input name="cari" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-dark" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
        </form>
    </div>

    <div class="container">
        <h4 class="d-flex justify-content-center fw-bold">{{$namaKategori}}</h4>
        <hr>
        <div class="row justify-content-center align-items-stretch">
            @foreach ($barang as $b)
            <div class="d-flex flex-column col-lg-3 col-md-5 col-sm-5 m-2 border rounded p-3">
                <div class="h-100">
                    <img src="/uploads/{{$b->image}}" class="img-fluid align-self-center" alt="...">
                </div>
                <div class="card-body text-center">
                    <h5 class="card-title fw-bolder fs-4 p-3">{{$b->nama}}</h5>
                    <h6 class="text-secondary">Harga : Rp. {{$b->harga}}/Strip</h6>
                    <div class="row align-items-center border-top border-bottom">
                        <div class="col p-2">
                            <li style="font-size: 9pt">{{$b->kategori}}</li>
                        </div>

                    </div>
                    <div class="d-flex py-2 justify-content-around">
                        <a href="/detail/{{$b->slug}}" class="btn btn-dark">
                            Detail
                        </a>
                        <div
                            class="col-3 border border-dark rounded-1 d-flex justify-content-center fw-bolder align-items-center">
                            {{$b->sisa}}
                        </div>
                    </div>
                </div>

            </div>
            @endforeach

        </div>
    </div>
</div>
<div class="pagination justify-content-center">
    {{ $barang->links() }}
</div>
@endsection