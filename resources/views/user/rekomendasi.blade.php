<div class="container my-4 p-5 bg-white px-5 rounded-3 shadow">

    <h5>Rekomendasi Barang Sesuai</h5>
    <hr>

    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon bg-primary" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="next">
            <span class="carousel-control-next-icon bg-primary " aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">

            <div class="carousel-item active">
                <div class="row align-items-stretch">
                    @foreach ($rekomendasi as $r)
                    <div class="col-md-4 col-6 my-2 d-flex ">
                        <div class="card shadow p-sm-3 w-100 h-100">
                            <img src="/uploads/{{ $r->image }}" class="img-fluid align-self-center" alt="...">
                            <div class="card-body text-center d-flex flex-column justify-content-end">
                                <h5 class="card-title fw-bolder py-1 textstyle">{{ $r->nama }}</h5>
                                <h6 class="text-secondary textstyle2">Harga : Rp. {{ $r->harga }}</h6>
                                <div class="row align-items-center border-top border-bottom">
                                    <div class="col p-2">
                                        <span style="font-size: 10pt">{{ $r->kategori }}</span>
                                    </div>
                                </div>
                                <div class="row px-sm-3 pt-2">
                                    <a href="/detail/{{ $r->slug }}" class="col btn btn-sm btn-dark m-1">
                                        Detail
                                    </a>
                                    <div
                                        class="col border border-dark rounded-1 d-flex justify-content-center fw-bolder align-items-center m-1">
                                        {{ $r->sisa }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<style>
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