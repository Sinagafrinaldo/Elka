@extends('user.navbar')

@section('content')
<div class="container mt-5 px-5">
    @foreach ($barang as $b)
    <div class="row">
        <h3>{{$b->nama}}</h3>
        <div class="col-lg-4 col-md-11 p-3 d-flex justify-content-center">
            <img src="/uploads/{{$b->image}}" style="height: 200px;" class="img-fluid" alt="...">
        </div>
        <div class="col">
            <div class="d-flex">
                <h5>{{$b->kategori}}</h5>
                <h5 class="ms-auto text-danger">Rp. {{$b->harga}},-</h5>
            </div>
            <hr>
            <h5>INFORMASI PRODUK LEBIH LANJUT</h5>
            <hr>
            {!!$b->deskripsi!!}
            <!-- <div class="fs-6">
                <p>
                    PARAMEX merupakan obat dengan kandungan Paracetamol, Propyphenazone, Caffeine, Dexchlorpheniramine
                    maleate. Obat ini dapat digunakan untuk meringankan sakit kepala dan sakit gigi.
                </p>
                <p>
                    Berisi 4 tablet dalam 1 strip.
                </p>
                <div class="fw-bold">
                    Indikasi Umum :
                </div>
                <p>
                    Meringankan sakit kepala dan sakit gigi
                </p>

            </div> -->
        </div>
    </div>
    <!-- <div class="row mt-5">
        <h5>INFORMASI PRODUK LEBIH LANJUT</h5>
        <hr>
        <div class="col fs-6">

            <p>
            <div class="fw-bold">Komposisi</div>
            <div>
                Paracetamol 250 mg, Propyphenazone 150 mg, Caffeine 50 mg, Dexchlorpheniramine maleate 1 mg
            </div>
            </p>

            <p>
            <div class="fw-bold">
                Dosis
            </div>
            <div>
                Dewasa dan anak-anak diatas 12 tahun : 2-3 kali sehari 1 tablet.
            </div>
            </p>

            <p>
            <div class="fw-bold">
                Aturan Pakai
            </div>
            <div>
                Sesudah makan
            </div>
            </p>

            <p>
            <div class="fw-bold text-danger">
                Perhatian
            </div>
            <div>
                Hati-hati penggunaan pada penderita porphyria akut karena dapat menimbulkan porphyrinogenic Bila setelah
                5 hari nyeri tidak hilang, segera hubungi dokter Obat ini dapat menyebabkan kantuk Penggunaan pada
                penderita yang mengkonsumsi alkohol dapat meningkatkan resiko kerusakan hati.
            </div>
            </p>
        </div>
    </div> -->
    @endforeach
    @include('user.rekomendasi')
</div>
@endsection