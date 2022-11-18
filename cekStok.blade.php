@extends('user.navbar')

@section('content')
    <div class="container py-5">
        <div class="container d-flex mb-3">
            <form action="/cari" method="GET" class="d-flex ms-auto" role="search">
                <input name="cari" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-dark" type="submit">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
            </form>
        </div>
        @if (isset($query))
            <h3>Hasil pencarian: {{ $query }}</h3>
            @if ($barang->isEmpty())
                <br><br><br>
                <h4>Tidak ada hasil dengan pencarian : {{ $query }}</h4>
            @endif
            <hr>
        @endif



        <div class="container">
            <div class="row align-items-stretch">
                @foreach ($barang as $b)
                    <div class="col-md-4 col-6 my-2 d-flex ">
                        @if ($b->sisa <= 0)
                            <div class="card shadow p-sm-3 w-100 h-100" style="background-color: #b7b8b6">
                                <img src="/uploads/{{ $b->image }}" class="img-fluid align-self-center" alt="..."
                                    style="-webkit-filter: grayscale(100%); filter: grayscale(100%);">
                            @else
                                <div class="card shadow p-sm-3 w-100 h-100">
                                    <img src="/uploads/{{ $b->image }}" class="img-fluid align-self-center"
                                        alt="...">
                        @endif
                        <div class="card-body text-center d-flex flex-column justify-content-end">
                            <h5 class="card-title fw-bolder py-1 textstyle">{{ $b->nama }}</h5>
                            <h6 class="text-secondary textstyle2">Harga : Rp. {{ $b->harga }}</h6>
                            <div class="row align-items-center border-top border-bottom">
                                <div class="col p-2">
                                    <span style="font-size: 10pt">{{ $b->kategori }}</span>
                                </div>
                            </div>


                            <div class="row px-sm-3 pt-2">
                                <a href="/detail/{{ $b->slug }}" class="col btn btn-sm btn-dark m-1">
                                    Detail
                                </a>
                                <div
                                    class="col border border-dark rounded-1 d-flex justify-content-center fw-bolder align-items-center m-1">
                                    Stok: {{ $b->sisa }}
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            @endforeach
        </div>
    </div>
    </div>

    <div class="pagination justify-content-center my-4">
        {{ $barang->links() }}
    </div>
    <style>
        .col-md-4 {
            padding-inline: 5px;
        }

        @media (max-width: 600px) {
            form {
                width: 100%;
            }

        }

        @media (min-width: 601px) {
            form {
                width: 50%;
            }

            img {
                width: 200px;
                margin-top: 5px;
            }

            .col-md-4 {
                padding-inline: 10px;
            }
        }

        @media (max-width: 400px) {
            img {
                width: 100px;
                margin-top: 5px;
            }

            .textstyle {
                font-size: 1rem;
            }

            .textstyle2 {
                font-size: 0.8rem;
            }

        }
    </style>
@endsection
