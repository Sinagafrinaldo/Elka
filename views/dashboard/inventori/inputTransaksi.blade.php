<link rel="shortcut icon" href="/assets/images/icon.svg" type="image/x-icon">
<title>Transaksi || Elka Farma</title>
@extends('layouts._dashboard.app')

@section('content')
    <div class="mx-4 mt-2">
        <div class="d-inline-flex">
            <h4 class="text-secondary">Inventory</h4>
            <i class="d-flex align-items-center mx-3 fa-solid fa-chevron-right text-dark"></i>
            <h4 class="text-dark fw-bold">Input Transaksi</h4>
        </div>
        <h6 class="fs-6 mt-1 mb-4">*Semua kolom wajib diisi.</h6>

        {{-- Tambah --}}
        <div class="row">
            <div class="col-lg-4 h-75 border border-secondary rounded-3 me-4 p-0" style="background-color: #E3EBF3">
                <h5 class="d-flex justify-content-center border-bottom border-secondary p-3 fw-bold text-success mb-5">
                    Tambah Pembelian</h5>
                <div class="px-4 mb-3">
                    <h6>Produk</h6>
                    <select class="form-select form-select-sm bg-transparent border-secondary"
                        aria-label="Default select example">
                        <option selected>-- Pilih Obat --</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
                <div class="px-4 mb-3">
                    <h6>Jumlah</h6>
                    <div class="input-group input-group-sm mb-3">
                        <input type="number" min="0" class="form-control bg-transparent border-secondary"
                            aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                    </div>
                </div>
                <div class="px-4 mb-3">
                    <h6>Harga</h6>
                    <div class="input-group input-group-sm mb-3">
                        <input type="text" class="form-control border-secondary text-dark" disabled
                            style="background-color: #BFBFBF" aria-label="Sizing example input"
                            aria-describedby="inputGroup-sizing-sm" value="Rp. 0">
                    </div>
                </div>
                <div class="d-flex px-4 mb-5 justify-content-center">
                    <button class="btn btn-primary w-100">
                        <i class="fa-solid fa-cart-shopping"></i>
                        Masuk Ke Keranjang
                    </button>
                </div>
            </div>

            {{-- Nota --}}
            <div class="col-lg-7 border border-secondary" style="background-color: #E3EBF3">
                <h5 class="d-flex justify-content-center border-bottom border-secondary p-3 fw-bold text-success mb-2">
                    Daftar Pembelian</h5>
                <div class="mx-2 p-2 bg-white">
                    <table class="table table-sm table-responsive" style="color: #656a6e">
                        <thead>
                            <tr>
                                <th scope="col">Produk</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Jumlah</th>
                                <th scope="col">Total</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>Paramex</th>
                                <td>Rp. 500</td>
                                <td>1</td>
                                <td>Rp. 500</td>
                                <td>
                                    <button class="btn btn-danger btn-sm">
                                        <i class="fa-solid fa-trash-can text-light"></i>
                                    </button>
                                </td>

                            </tr>
                            <tr>
                                <th>Oskadon</th>
                                <td>Rp. 1.000</td>
                                <td>2</td>
                                <td>Rp. 2.000</td>
                                <td>
                                    <button class="btn btn-danger btn-sm">
                                        <i class="fa-solid fa-trash-can text-light"></i>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="d-flex px-5 py-2 fw-bold">
                    <div class="fs-6 ms-auto me-3">Total</div>
                    <div class="fs-6">Rp. 2.000</div>
                </div>
                <div class="d-flex p-3">
                    <div class="col-6">
                        <div class="d-flex">
                            <div class="col mb-2">
                                <h6 class="fw-normal">Bayar</h6>
                                <input type="text" style="width: 90%">
                            </div>
                            <div class="col">
                                <h6 class="fw-normal">Kembalian</h6>
                                <input disabled type="text" style="width: 90%">
                            </div>
                        </div>
                        <div class="col pe-3">
                            <button class="btn btn-dark btn-sm w-100">
                                Tambah Transaksi
                            </button>
                        </div>
                    </div>
                    <div class="col-6 ">
                        <h6 class="fw-normal">Catatan (Opsional)</h6>
                        <textarea style="width: 90%; height: 80%"></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
