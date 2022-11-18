<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
    crossorigin="anonymous"></script>

@extends('user.navbar')

@section('content')
{{-- CAROUSEL SLIDER --}}
<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
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
            <img src="/assets/1.png" class="d-block w-100">
        </div>
        <div class="carousel-item">
            <img src="/assets/2.png" class="d-block w-100">
        </div>
        <div class="carousel-item">
            <img src="/assets/3.png" class="d-block w-100">
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
        data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
        data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

{{-- TENTANG KAMI --}}
<section class="p-2 p-sm-4 my-5">
    <div class="container p-md-10">
        <div class="row">
            <div class="col-lg-5 col-md-12 col-12 d-flex">
                <div class="about-img align-self-center mb-4 ">
                    <img src="./assets/p.jpg" alt="" class="img-fluid">
                </div>
            </div>
            <div class="col-lg-7 col-md-12 col-12 ps-lg-5 mt-md-5 mb-md-5">
                <div class="about-text">
                    <h2 class="d-flex justify-content-center justify-content-sm-start">Tentang Kami</h2>
                    <hr class="mt-1" style="border-width: 2px">
                    <p style="text-align: justify">
                        Apotek Elka Farma adalah sebuah apotek yang didirikan pada tahun 2005 dengan pemilik apotek
                        bernama ginting.
                        Nama Elka Farma sendiri diambil dari kata elka yang berarti perempuan dan farma yang berarti
                        berkaitan dengan obat atau tentang obat.
                        Hal ini disesuaikan dengan kepemilikan awal apotek yang seorang perempuan serta fokus bisini
                        yang kearah...
                    </p>
                    <div class="d-flex justify-content-end justify-content-sm-start">
                        <a href="/tentang-kami" class="btn btn-primary">Selengkapnya</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- LAYANAN --}}
<div class="layanan">
    <div class="about-text w-100">
        <h2 class="text-center">PRODUK</h2>
        <hr class="mt-4 mb-3" style="border-width: 2px">
        <div class="row justify-content-center mb-5 ">
            @foreach ($kategori as $k)
            <a href="/list-kategori/{{ $k->slug }}" class="kategori mx-2">
                <img src="/kategori/{{ $k->gambar }}" class="rounded-circle align-self-center">
                <h6 class="w-auto mt-2" style="text-align: center;">{{ $k->nama }}</h6>
            </a>
            @endforeach
        </div>

        <h2 class="text-center">LAYANAN</h2>
        <hr class="mt-4 mb-3" style="border-width: 2px">
        <div class="cek-layanan">
            <div class="row justify-content-center">
                @foreach ($layanan as $l)
                <a href="" name="test" type="button" class="py-1 py-lg-3" data-bs-toggle="modal"
                    data-bs-target="#{{ str_replace(' ', '-', $l->title) }}">
                    {{ $l->title }}
                </a>
                @endforeach
            </div>
        </div>
    </div>
</div>

@foreach ($layanan as $l)
<!-- The Modal -->
<div class="modal fade" id="{{ str_replace(' ', '-', $l->title) }}">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">{{ $l->title }}</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body px-4">
                <div class="d-flex justify-content-center">
                    <img src="/layanan/{{ $l->image }}" alt="" class="img-fluid">
                </div>
                <p class="mt-4" style="text-align: justify">
                    {!! $l->desc !!}
                </p>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
            </div>

        </div>
    </div>
</div>
@endforeach

{{-- LOKASI --}}
<div class="container mb-5 mt-5">
    <div class="row p-3 bg-white">
        <div class="col-lg-7 col-md-12 col-12 ps-lg-5 mt-md-5 mb-5">
            <div class="about-text">
                <h2>Lokasi Apotek</h2>
                <hr class="mt-1" style="border-width: 2px">
                <p style="text-align: justify">
                    Apotek Elka Farma beralamatkan di Jalan Way Ratai, Padang Cermin, Kec. Padang Cermin,
                    Kabupaten Pesawaran, Lampung kode pos 35451.
                </p>
                <p>
                    Buka : Senin - Jumat <br>
                    Pukul : 08.00 - 17.00
                </p>
                <a href="https://goo.gl/maps/fZZG1B3YBPmK9kyB9" class="btn btn-primary">Lihat Maps</a>
            </div>
        </div>
        <div class="col-lg-5 col-md-12 col-12">
            <div id="map-container-google-1">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3970.7674545292016!2d105.13688861408548!3d-5.601332957127351!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e41299383ebc231%3A0x1d874096b4360f52!2sApotik%20Elka%20Farma!5e0!3m2!1sid!2sid!4v1664393129418!5m2!1sid!2sid"
                    width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
</div>
@endsection

@section('style')
<style>
    .layanan {
        background: url('./assets/layanan.png');
        background-size: cover;
        background-position: center;
        color: white;
        height: auto;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        padding: 1rem;
        padding-block: 4rem;
    }

    .layanan a img {
        width: 3vmax;
    }

    .layanan .kategori {
        padding: 0;
        text-decoration: none;
        color: black;
        display: flex;
        flex-direction: column;
        width: 140px;
        height: 140px;
        background-color: white;
        padding: 1rem;
        border-radius: 50%;
        justify-content: center;
    }

    .layanan .text-center {
        font-size: 1.5rem;
    }

    .cek-layanan {
        display: flex;
        justify-content: center;
        width: 100%;
    }

    .layanan h2 {
        font-size: 2rem;
    }

    .cek-layanan a {
        text-decoration: none;
        color: black;
        font-size: 1.06rem;
        background-color: white;
        border-radius: 10px;
        width: 35vw;
        padding-block: 5px;
        margin: 0.5rem;
        text-align: center;
    }

    @media(max-width: 680px) {
        .cek-layanan a {
            font-size: 0.7rem;
            margin: 0.3rem;
            width: 42vw;
        }

        .layanan .kategori {
            width: 90px;
            height: 90px;
        }

        .layanan .kategori h6 {
            font-size: 7pt;
        }
    }

    @media(max-width: 439px) {
        .layanan .kategori {
            width: 70px;
            height: 70px;
        }

        .layanan .kategori h6 {
            font-size: 5pt;
        }
    }
</style>
@endsection