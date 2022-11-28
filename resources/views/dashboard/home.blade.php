<link rel="shortcut icon" href="/assets/images/icon.svg" type="image/x-icon">
<title>Dashboard Admin || Elka Farma</title>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

@extends('layouts._dashboard.app')

@section('content')
<div class="container-fluid" style="width: 98%">
    <div class="d-flex flex-column flex-sm-row  mb-3">
        <div>
            <h4 class="mt-1">Dashboard</h4>
            <span class="fst-normal">Halaman Dashboard Admin</span>
        </div>
        <div class="ms-auto mt-3">
            <a href="{{ route('admin.inputTransaksi') }}" class="btn btn-danger">
                <i class="fa-solid fa-plus"></i>
                Transakasi</a>
        </div>
    </div>

    <div class="container pb-3">
        <div class="row justify-content-center">
            {{-- Pendapatan --}}
            <div class="col-lg col-md-5 col-sm-5 m-2 px-0 bg-white d-flex flex-column justify-content-between"
                style="border: solid 1px #FED600; border-radius: 6px;">
                <div class="d-block text-center px-3 pt-2">
                    <img src="/assets/icon-dashboard/money.png" width="40px" height="40px" />
                    <div id="outputPendapatan" class="fs-5 mt-2">Rp. {{ number_format($pendapatan) }},-</div>
                    <div class="row mb-2">
                        <div class="col-5">
                            <h6 class="my-2">Pendapatan: </h6>
                        </div>
                        <div class="col">
                            <select id="periodePendapatan" class="form-select form-select-sm border-0"
                                aria-label=".form-select-sm example">

                                @foreach ($periode as $p)
                                <option value="{{ $p }}" {{ date('F Y')==$p ? 'selected' : '' }}>
                                    {{ $p }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <a href="{{ route('admin.laporan_penjualan') }}"
                    class="d-flex p-2 badge text-dark justify-content-center align-items-stretch text-decoration-none"
                    style="background-color: rgba(254, 214, 0, 0.3)">
                    Lihat Detail Laporan
                    <i class="fa-solid fa-angles-right ms-2"></i>
                </a>
            </div>

            {{-- inventory --}}
            <div class="col-lg m-2 col-md-5 col-sm-5 px-0 bg-white d-flex flex-column justify-content-between"
                style="border: solid 1px #03A9F5; border-radius: 6px;">
                <div class="d-block text-center px-3 pt-2">
                    <img src="/assets/icon-dashboard/medical.png" width="40px" height="40px" />
                    <div class="fs-5 mt-2">{{ $jumlah }} Produk</div>
                    <div class="d-flex mb-2 justify-content-center">
                        <h6 class="me-2 my-2">Daftar Produk </h6>
                    </div>
                </div>
                <a href="{{ route('admin.daftarObat') }}"
                    class="d-flex p-2 badge text-dark justify-content-center text-decoration-none"
                    style="background-color: rgba(3, 169, 245, 0.3)">
                    Lihat Inventory
                    <i class="fa-solid fa-angles-right ms-2"></i>
                </a>
            </div>

            {{-- kadaluarsa --}}
            <div class="col-lg m-2 col-md-5 col-sm-5 px-0 bg-white d-flex flex-column justify-content-between"
                style="border: solid 1px #01A768; border-radius: 6px;">
                <div class="d-block text-center px-3 pt-2">
                    <img src="/assets/icon-dashboard/plus_P.png" width="40px" height="40px" />
                    <div class="fs-5 mt-2">{{ $kadaluarsa }} Produk</div>
                    <div class="d-flex mb-2 justify-content-center">
                        <h6 class="me-2 my-2">Produk Kadaluarsa </h6>
                    </div>
                </div>
                <a href="{{ route('admin.kadaluarsa') }}"
                    class="d-flex p-2 badge text-dark justify-content-center text-decoration-none"
                    style="background-color: rgba(1, 167, 104, 0.3)">
                    Lihat Detail
                    <i class="fa-solid fa-angles-right ms-2"></i>
                </a>
            </div>

            {{-- kurang stok --}}
            <div class="col-lg m-2 col-md-5 col-sm-5 px-0 bg-white d-flex flex-column justify-content-between"
                style="border: solid 1px #F0483E; border-radius: 6px;">
                <div class="d-block text-center px-3 pt-2">
                    <img src="/assets/icon-dashboard/danger.png" width="40px" height="40px" />
                    <div class="fs-5 mt-2">{{ $minim }} Produk</div>
                    <div class="d-flex mb-2 justify-content-center">
                        <h6 class="me-2 my-2">Kekurangan Stok</h6>
                    </div>
                </div>
                <a href="/admin/laporan-barang-sisa/stok-minim"
                    class="d-flex p-2 badge text-dark justify-content-center text-decoration-none"
                    style="background-color: rgba(240, 72, 62, 0.3)">
                    Lihat Detail
                    <i class="fa-solid fa-angles-right ms-2"></i>
                </a>
            </div>
        </div>
    </div>


</div>

<div class="p-4 bg-white">
    <div class="row justify-content-center">
        <div class="col-lg-5 col-md-11 col-sm-9 m-2 p-0">
            {{-- Inventory --}}
            <div class="col border border-2 mb-3">
                <div class="d-flex p-3 py-2 border-bottom border-2 ">
                    <h6>Inventory</h6>
                    <a href="{{ route('admin.daftarObat') }}"
                        class="d-flex ms-auto badge text-dark text-decoration-none align-items-center">
                        <span>Lihat Selengkapnya</span>
                        <i class="fa-solid fa-angles-right ms-2"></i>
                    </a>
                </div>
                <div class="row p-3 px-5">
                    <div class="col">
                        <h5 class="fw-bolder">{{ $pcs }}</h5>
                        <span>Jumlah Produk</span>
                    </div>
                    <div class="col">
                        <h5 class="fw-bolder">{{ $kategori }}</h5>
                        <span>Kategori</span>
                    </div>
                </div>
            </div>

            {{-- Pembeli --}}
            <div class="col border border-2 mb-3">
                <div class="d-flex border-bottom border-2  p-3 py-2">
                    <h6>Pembeli</h6>
                    <a href="{{ route('admin.laporan_penjualan') }}"
                        class="d-flex ms-auto badge text-dark text-decoration-none align-items-center">
                        <span>Lihat Laporan Penjualan</span>
                        <i class="fa-solid fa-angles-right ms-2"></i>
                    </a>
                </div>
                <div class="row p-3 px-5">
                    <div class="col">
                        <h5 class="fw-bolder">{{ $pembeli }}</h5>
                        <span>Jumlah Pembeli</span>
                    </div>
                    <div class="col">
                        <h5 class="fw-bolder">Rp. {{ number_format($pendapatan_total) }},-</h5>
                        <span>Pendapatan</span>
                    </div>
                </div>
            </div>

        </div>
        {{-- Penjualan Bulanan --}}
        <div class="col-lg-6 col-md-11 col-sm-9 border border-2 m-2 p-0">
            <div class="d-flex p-3 py-2 border-bottom border-2">
                <h6 class="w-100">Pemasukan Bulanan</h6>
                <select id="periodeSelect" class="form-select form-select-sm border-0"
                    aria-label=".form-select-sm example">
                    @foreach ($periode as $p)
                    <option value="{{ $p }}" {{ date('F Y')==$p ? 'selected' : '' }}>
                        {{ $p }}</option>
                    @endforeach
                </select>

            </div>
            <div id="lineChartContent">
                <canvas id="myChart" style="width: 900px; height: 500px"></canvas>
            </div>
        </div>

        @php
        $label = [];
        $data = [];
        @endphp

        @foreach ($list as $key => $value)
        @php
        array_push($label, substr($value->tanggal, -2));
        array_push($data, $value->total);
        @endphp
        @endforeach

    </div>
</div>


<style>
    .form-select {
        cursor: pointer;
    }

    h6 {
        font-weight: bold;
    }
</style>


<?php
    $name = 'PHP variable';
    echo '<script>';
    echo 'var labels = ' . json_encode($label) . ';';
    echo '</script>';
    ?>

<?php
    $name = 'PHP variable';
    echo '<script>';
    echo 'var datas = ' . json_encode($data) . ';';
    echo '</script>';
    ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'csrftoken': '{{ csrf_token() }}'
        }
    });
</script>

<script>
    // console.log(labels)
    // console.log(datas)
    // labels = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23', '24', '25', '26', '27', '28', '29', '30', '31', ]
    function newchart(labels, data2) {
        const data = {
            labels: labels,
            datasets: [{
                label: 'Data Pemasukan',
                backgroundColor: '#109CF1',
                borderColor: '#109CF1',

                data: data2
            }]
        };

        const config = {
            type: 'line',
            data: data,
            options: {
                scales: {
                    y: {
                        title: {
                            display: true,
                            text: 'Pemasukan Rp'
                        },

                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Tanggal'
                        }
                    }
                }
            }
        };
        const myChart = new Chart(
            document.getElementById('myChart'),
            config
        );
    }

    newchart(labels, datas)

    $('#periodeSelect').on('change', function () {
        $value = $(this).val();

        $.ajax({
            type: 'get',
            url: "{{ URL::to('/admin/periode-select') }}",
            data: {
                'search': $value
            },

            success: function (data) {
                console.log(data[0])
                console.log(data[1])
                labels = data[0];
                datas = data[1];
                var pieChartContent = document.getElementById('lineChartContent');
                pieChartContent.innerHTML = '&nbsp;';
                $('#lineChartContent').append(
                    '<canvas id="myChart" width="900px" height="500px"><canvas>');

                ctx = $("#myChart").get(0).getContext("2d");
                // var myPieChart = new Chart(ctx).Pie(data, options);
                newchart(labels, datas)

            }
        });
    })

    $('#periodePendapatan').on('change', function () {
        $value = $(this).val();

        $.ajax({
            type: 'get',
            url: "{{ URL::to('/admin/periode-pendapatan') }}",
            data: {
                'search': $value
            },

            success: function (data) {
                $('#outputPendapatan').html(data);

            }
        });
    })
</script>

<script type="text/javascript"></script>
@endsection