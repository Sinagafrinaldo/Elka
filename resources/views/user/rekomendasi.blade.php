<div class="container my-4 p-3 p-sm-5 bg-white px-sm-5 px-3 rounded-3 shadow">
    <h5>Rekomendasi Barang Sesuai</h5>
    <hr>
    <div class="over">
        <div class="d-flex w-over">
            @foreach ($rekomendasi as $b)
                <div class="col-md-4 col-6 my-2 d-flex  me-3 ">
                    <div class="card shadow p-sm-3 w-100 h-100">
                        <img src="/uploads/{{ $b->image }}" class="img-fluid align-self-center m-auto" alt="...">
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
<style>
    .over {
        overflow-x: auto;
    }

    /* .w-over {} */

    .over::-webkit-scrollbar {
        display: none;
    }

    @media (max-width: 450px) {
        h6 {
            font-size: 7pt;
        }

        .col-5 {
            padding: 0;
        }

        .img-fluid {
            width: 100px;
            height: 100px;
            margin-top: 10px;
        }

        .form-search {
            width: 100%;
        }
    }

    @media (min-width: 450px) {
        .img-fluid {
            width: 200px;
            height: auto;
        }

        .form-search {
            width: 50%;
        }
    }
</style>
