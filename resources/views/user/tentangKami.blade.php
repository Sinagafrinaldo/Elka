@extends('user.navbar')

@section('content')
    {{-- TENTANG KAMI --}}
    <section class="p-sm-5 py-5 px-1">
        <div class="container mb-5">
            <div class="d-flex flex-column p-3 p-sm-5 text-center bg-white shadow">
                <h2>Tentang Kami</h2>
                <hr class="mt-1" style="border-width: 2px">
                <div class="d-flex flex-column">
                    <div class="about-img align-self-center mb-5">
                        <img src="./assets/tentang.png" alt="" class="img-fluid">
                    </div>
                    <div class="about-text px-0">
                        <div class="fs-5 mt-3 mb-2 text-start fw-bold">Jam Buka</div>
                        <p style="text-align: justify">
                            Apotek Elka Farma buka di hari senin sampai sabtu dari pukul 08.00-17.00 WIB
                        </p>
                    </div>
                    <div class="about-text px-0">
                        <div class="fs-5 mt-1 mb-2 text-start fw-bold">Tentang Apotek</div>
                        <p style="text-align: justify">
                            Apotek Elka Farma adalah sebuah apotek yang didirikan pada tahun 2005 dengan pemilik apotek
                            bernama ginting.
                            Nama Elka Farma sendiri diambil dari kata elka yang berarti perempuan dan farma yang berarti
                            berkaitan dengan obat atau tentang obat.
                            Hal ini disesuaikan dengan kepemilikan awal apotek yang seorang perempuan serta fokus bisini
                            yang kearah obat-obatan.
                            Apotek ini telah memiliki izin resmi untuk beroperasi oleh Dinas Kesehatan Kabupaten Pesawaran.
                            Apotek ini beralamatkan di Jalan Way Ratai, Padang Cermin, Kec. Padang Cermin, Kabupaten
                            Pesawaran, Lampung.
                        </p>
                    </div>
                    <div class="about-text px-0">
                        <div class="fs-5 mt-1 mb-2 text-start fw-bold">Produk</div>
                        <p style="text-align: justify">
                            Apotek Elka Farma berfokus seperti layaknya sebuah Apotek yaitu memaksimalkan penjualan obat
                            sesuai kebutuhan konsumen. Adapun obat yang dijual memiliki beragam kategori mulai dari obat
                            sakit kepala, obat flu, obat sakit gigi dan lain sebagainya.
                            Keunggulan dari Apotek ini ialah Anda dapat melihat terllebih dahulu kesediaan obat pada menu
                            daftar obat
                            sebelum anda pergi menuju Apotek. Di menu daftar obat tersebut Anda dapat mencari obat yang Anda
                            butuhkan kemudian
                            melihat apakah obat tersedia atau tidak. Hal ini akan mebuat Anda lebih pasti untuk berbelanja
                            di tempat kami.
                            Selain dari pada itu kami juga menyediakan layanan kesehatan berbayar diantaranya ada cek
                            kolesterol, cek gula darah,
                            cek tensi darah dan cek asam urat. Untuk detail dari layanan tersebut Anda dapat melihatnya di
                            menu utama (home)
                        </p>
                    </div>
                </div>

            </div>


            {{-- LOKASI --}}
            <div class="container mb-5 mt-5">
                <div class="row p-3 bg-white shadow">
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
    </section>

    <style>
        body {
            background-color: #F6F6F6;
        }

        @media (max-width: 400px) {
            img {
                width: 100%;
            }
        }

        @media (min-width: 401px) {
            img {
                width: 50%;
            }
        }
    </style>
@endsection
