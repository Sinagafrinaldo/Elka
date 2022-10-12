@extends('user.navbar')

@section('content')
    {{-- TENTANG KAMI --}}
    <section class="p-5">
        <div class="container p-10">
            <div class="row">
                <div class="col-lg-5 col-md-12 col-12 d-flex">
                    <div class="about-img align-self-center">
                        <img src="./assets/3.jpg" alt="" class="img-fluid">
                    </div>
                </div>
                <div class="col-lg-7 col-md-12 col-12 ps-lg-5 mt-md-5 mb-md-5">
                    <div class="about-text">
                        <h2>Tentang Kami</h2>
                        <hr class="mt-1" style="border-width: 2px">
                        <p style="text-align: justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe vel
                            architecto qui necessitatibus
                            delectus doloremque amet iure blanditiis cum fuga, nostrum nesciunt accusantium maxime ratione
                            in vero repellat error dolor.
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe vel architecto qui necessitatibus
                            delectus doloremque amet iure blanditiis cum fuga, nostrum nesciunt accusantium maxime ratione
                            in vero repellat error dolor.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- LOKASI --}}
    <section class="pb-5 mb-5">
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
