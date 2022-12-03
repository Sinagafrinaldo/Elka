<link rel="shortcut icon" href="/assets/images/icon.svg" type="image/x-icon">
<meta name="_token" content="{!! csrf_token() !!}" />
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- <meta name="csrf-token" content="{{ csrf_token() }}"> -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js"
    integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>
<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css"
    integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" /> -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<title>Transaksi || Elka Farma</title>
@extends('layouts._dashboard.app')

@section('content')

<?php
date_default_timezone_set('Asia/Jakarta');   
$time = date("Y-m-d", time()); 
?>
<div class="mx-4 mt-2">
    <div class="d-inline-flex">
        <h4 class="text-secondary">Inventory</h4>
        <i class="d-flex align-items-center mx-3 fa-solid fa-chevron-right text-dark"></i>
        <h4 class="text-dark fw-bold">Input Transaksi</h4>
    </div>
    <h6 class="fs-6 mt-1 mb-4">*Semua kolom wajib diisi.</h6>

    {{-- Tambah --}}
    <div class="row mb-5">
        <div class="col-lg-4 h-75 mb-4 mb-lg-0 border border-secondary rounded-3 me-4 p-0"
            style="background-color: #E3EBF3">
            <h5 class="d-flex justify-content-center border-bottom border-secondary p-3 fw-bold text-success mb-5">
                Tambah Pembelian</h5>
            <div class="px-4 mb-3">
                <h6>Produk</h6>
                <select id="produkList" class="form-select form-select-sm border-secondary"
                    aria-label="Default select example" aria-placeholder="Pilih produk.." required>
                    <option value="null">-- Pilih Produk --</option>
                    @foreach ($barang as $b)
                    <option
                        style=" @if ($b->kadaluarsa< $time && $b->sisa <= 0) color: gray  @elseif ($b->kadaluarsa< $time) color: #ff3700 @endif"
                        value="{{ $b->nama }}" name="{{ $b->nama }}" @if ($b->sisa <= 0 || $b->kadaluarsa<$time)
                                disabled @endif>{{ $b->nama
                                }} -
                                Stok : {{ $b->sisa }} </option>
                    @endforeach
                </select>
            </div>
            <div class="px-4 mb-3">
                <h6>Jumlah</h6>
                <div class="input-group input-group-sm mb-3">
                    <input id="jumlah" type="number" min="0" class="form-control bg-transparent border-secondary"
                        aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" value=1>
                </div>
                <div id="validasiJumlah"></div>
            </div>
            <div class="px-4 mb-3">
                <h6>Harga</h6>
                <div id="output" class="input-group input-group-sm mb-3">
                    <input id="harga" type="text" class="form-control border-secondary text-dark" disabled
                        style="background-color: #BFBFBF" aria-label="Sizing example input"
                        aria-describedby="inputGroup-sizing-sm">
                </div>
            </div>
            <div class="d-flex px-4 mb-5 justify-content-center">
                <button id="keranjang" class="btn btn-primary w-100">
                    <i class="fa-solid fa-cart-shopping"></i>
                    Masuk Ke Keranjang
                </button>
            </div>
        </div>

        {{-- Nota --}}
        <div class="col-lg-7 border border-secondary pb-4" style="background-color: #E3EBF3">
            <h5 class="d-flex justify-content-center border-bottom border-secondary p-3 fw-bold text-success mb-2">
                Daftar Pembelian</h5>


            <div id="rincian" class="mx-2 p-2 bg-white over">
                <div class="row px-4 w-table ">
                    <table class="table table-sm table-responsive text-center" style="color: #656a6e">
                        <thead>
                            <tr>
                                <th scope="col">Produk</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Jumlah</th>
                                <th scope="col">Total</th>
                                <th id="aksi" scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="outputList">

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="d-flex px-5 py-2 fw-bold">
                <div class="fs-6 ms-auto me-3">Total Rp. </div>
                <div id="bigTotal" class="fs-6"> 0</div>
            </div>
            <div class="row flex-column flex-sm-row p-3">
                <div class="col-12 col-sm-6">
                    <div class="d-flex">
                        <div class="col mb-2">
                            <h6 class="fw-normal">Bayar</h6>
                            <input id="bayar" type="text" style="width: 90%">
                        </div>
                        <div class="col">
                            <h6 class="fw-normal">Kembalian</h6>
                            <input id="kembalian" disabled type="text" style="width: 90%" min=0>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6">
                    <h6 class="fw-normal">Catatan (Opsional)</h6>
                    <textarea style="width: 90%; height: 80%" id="deskripsi"></textarea>
                    <button id="nota" class="btn btn-primary btn-sm w-50" style="margin-top: 10px;">
                        Nota (.pdf)
                    </button>
                </div>
                <div class="col-12 py-3 col-sm-4">
                    <button id="transaksi" class="btn btn-dark btn-sm w-100">
                        Tambah Transaksi
                    </button>
                </div>
                <div id="tests"></div>
            </div>
        </div>
    </div>
</div>

<style>
    @media(max-width: 450px) {
        .over {
            overflow-x: auto;
        }

        .w-table {
            width: 600px;
        }
    }
</style>
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });
</script>
<script src="/script/input.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script> -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js"></script>
<script>
    $("#produkList").select2();
</script>
@endsection
