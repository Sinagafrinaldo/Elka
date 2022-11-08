@extends('user.navbar')

@section('content')
<div class="container py-5">
    <div class="container d-flex mb-3">
        <form action="/cari" method="GET" class="d-flex ms-auto w-50" role="search">
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



    <div class="container p-0">
        <div class="row justify-content-center align-items-stretch">
            @foreach ($barang as $b)
            <div class="col-md-4 col-5 my-2">
                <div class="card p-sm-3 w-100 h-100">
                    <img src="/uploads/{{ $b->image }}" class="img-fluid align-self-center" alt="...">
                    <div class="card-body text-center d-flex flex-column justify-content-end">
                        <h6 class="card-title fw-bolder py-1 textstyle">{{ $b->nama }}</h6>
                        <h6 class="text-secondary textstyle">Harga : Rp. {{ $b->harga }}/Strip</h6>
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
                                {{ $b->sisa }}
                            </div>
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
<style>
    @media (max-width: 450px) {
        h6 {
            font-size: 7pt;
        }
    }
</style>
@endsection