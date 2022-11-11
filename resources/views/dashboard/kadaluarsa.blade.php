<link rel="shortcut icon" href="/assets/images/icon.svg" type="image/x-icon">
<title>Kadaluarsa || Elka Farma</title>
@extends('layouts._dashboard.app')

@section('content')
    <div class="mx-4 mt-2">
        <h4 class="mb-4">Barang Kadaluarsa</h4>
        <div class="row">
            <div class="col-12 col-md-6">
                <form class="d-flex mt-2">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit"><i
                            class="fa-solid fa-magnifying-glass"></i></button>
                </form>
            </div>
            <div class="d-flex align-items-center col-7 col-md-5 col-lg-3 ms-auto">
                <i class="fa-solid fa-filter me-3" style="font-size: 14pt"></i>
                <select class="form-select form-select-sm" aria-label=".form-select-sm example">
                    <option selected>-- Pilih Jenis --</option>
                    <option value="1">Jan</option>
                    <option value="2">Feb</option>
                    <option value="3">Mar</option>
                    <option value="1">Apr</option>
                    <option value="2">Mei</option>
                    <option value="3">Jun</option>
                    <option value="1">Jul</option>
                    <option value="2">Aug</option>
                    <option value="3">Sep</option>
                    <option value="1">Okt</option>
                    <option value="2">Nov</option>
                    <option value="3">Des</option>
                </select>
            </div>
        </div>

        {{-- Table --}}
        <div class="row mt-3 mx-1 p-2 bg-white">
            <table class="table table-hover table-responsive text-center" style="color: #656a6e">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">ID Produk</th>
                        <th scope="col">Produk</th>
                        <th scope="col">Jenis Produk</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Jumlah</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>12533</td>
                        <td>Paramex</td>
                        <td>Obat Kepala</td>
                        <td>01/10/2022</td>
                        <td>3</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>12533</td>
                        <td>Paramex</td>
                        <td>Obat Kepala</td>
                        <td>01/10/2022</td>
                        <td>3</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <style>
        select {
            cursor: pointer;
        }
    </style>
@endsection
