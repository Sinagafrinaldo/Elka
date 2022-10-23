@extends('dashboard.laporan')

@section('title')
    <h4 class="text-dark fw-bold">Barang Masuk</h4>
@endsection

@section('table')
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
@endsection
