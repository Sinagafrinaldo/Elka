@extends('user.navbar')

@section('content')
    {{-- CAROUSEL SLIDER --}}
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
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
                <img src="./assets/1.jpg" class="d-block w-100 h-10" alt="slider1">
            </div>
            <div class="carousel-item">
                <img src="./assets/2.jpg" class="d-block w-100 h-10" alt="slider2">
            </div>
            <div class="carousel-item">
                <img src="./assets/3.jpg" class="d-block w-100 h-10" alt="slider3">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    {{-- TENTANG KAMI --}}
    <section class="p-4 pt-5">
        <div class="container p-md-10">
            <div class="row mb-5 ">
                <div class="col-lg-5 col-md-12 col-12 d-flex">
                    <div class="about-img align-self-center mb-4 ">
                        <img src="./assets/3.jpg" alt="" class="img-fluid">
                    </div>
                </div>
                <div class="col-lg-7 col-md-12 col-12 ps-lg-5 mt-md-5 mb-md-5">
                    <div class="about-text">
                        <h2 class="d-flex justify-content-center justify-content-sm-start">Tentang Kami</h2>
                        <hr class="mt-1" style="border-width: 2px">
                        <p style="text-align: justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe vel
                            architecto qui necessitatibus
                            delectus doloremque amet iure blanditiis cum fuga, nostrum nesciunt accusantium maxime ratione
                            in vero repellat error dolor.
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe vel architecto qui necessitatibus
                            delectus doloremque amet iure blanditiis cum fuga, nostrum nesciunt accusantium maxime ratione
                            in vero repellat error dolor.
                        </p>
                        <div class="d-flex justify-content-center justify-content-sm-start">
                            <a href="/tentang-kami" class="btn btn-primary">Selengkapnya</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- LAYANAN --}}
    <div class="layanan">
        <img src="./assets/layanan.png" class="layanan-img">
        <div class="layanan-desc">
            <div class="about-text w-100">
                <h2 class="text-center">PRODUK</h2>
                <hr class="mt-4 mb-5" style="border-width: 2px">
                <div class="row justify-content-center mb-5 ">
                    <a href="" class="px-4 py-2 w-auto">
                        <img src="./assets/layanan-icon/1.png">
                    </a>
                    <a href="" class="px-4 py-2 w-auto">
                        <img src="./assets/layanan-icon/2.png">
                    </a>
                    <a href="" class="px-4 py-2 w-auto">
                        <img src="./assets/layanan-icon/3.png">
                    </a>
                    <a href="" class="px-4 py-2 w-auto">
                        <img src="./assets/layanan-icon/4.png">
                    </a>
                </div>

                <h2 class="text-center">LAYANAN</h2>
                <hr class="mt-4 mb-5" style="border-width: 2px">
                <div class="row justify-content-center mb-5 cek-layanan">
                    <div class="w-auto d-flex flex-column">
                        <a href="/layanan/cek-kolesterol">Cek Kolesterol</a>
                        <a href="/layanan/cek-asam-urat">Cek Asam Urat</a>
                    </div>
                    <div class="w-auto d-flex flex-column">
                        <a href="/layanan/cek-gula-darah">Cek Gula Darah</a>
                        <a href="/layanan/cek-tensi-darah">Cek Tensi Darah</a>
                    </div>
                </div>

            </div>
        </div>
    </div>



    {{-- LOKASI --}}
    <section class="p-4 mt-5 mb-5" id="lokasi">
        <div class="container p-10">
            <div class="row">
                <div class="col-lg-7 col-md-12 col-12 ps-lg-5 mt-md-5 mb-5">
                    <div class="about-text">
                        <h2>Lokasi Apotek</h2>
                        <hr class="mt-1" style="border-width: 2px">
                        <p style="text-align: justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe vel
                            architecto qui necessitatibus
                            delectus doloremque amet iure blanditiis cum fuga, nostrum nesciunt accusantium maxime ratione
                            in vero repellat error dolor.
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
    </section>
@endsection

@section('style')
    <style>
        .carousel-item {
            background: no-repeat scroll center scroll;
            -webkit-background-size: cover;
            background-size: cover;
        }

        .carousel-item::before {
            content: "";
            display: block;
            background: #000;
            opacity: 0.3;
            position: absolute;
            top: 0;
            left: 0;
            bottom: 0;
            right: 0;
        }

        .layanan-img {
            position: absolute;
            z-index: -1;
            width: 100%;
        }

        .layanan-desc {
            background-color: #000;
            background: rgba(38, 45, 54, 0.81);
            color: white;
            height: auto;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding-block: 4rem;
            padding-inline: 5rem;
        }

        .cek-layanan a {
            text-decoration: none;
            color: black;
            font-size: 14pt;
            background-color: white;
            border-radius: 10px;
            padding-block: 18px;
            padding-inline: 150px;
            margin: 14px;
        }
    </style>
@endsection
