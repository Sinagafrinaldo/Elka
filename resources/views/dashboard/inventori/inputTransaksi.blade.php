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
                        aria-label="Default select example" aria-placeholder="Pilih produk..">
                        <option selected disabled>-- Pilih Obat --</option>
                        @foreach ($barang as $b)
                            <option value="{{ $b->nama }}" name="{{ $b->nama }}"
                                @if ($b->sisa <= 0) disabled @endif>{{ $b->nama }} -
                                Stok : {{ $b->sisa }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="px-4 mb-3">
                    <h6>Jumlah</h6>
                    <div class="input-group input-group-sm mb-3">
                        <input id="jumlah" type="number" min="0"
                            class="form-control bg-transparent border-secondary" aria-label="Sizing example input"
                            aria-describedby="inputGroup-sizing-sm" value=1>
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
                        <table class="table table-sm table-responsive" style="color: #656a6e">
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
    <script type="text/javascript">
        // $(document).ready(function () {
        //     $('select').selectize({
        //         sortField: 'text'
        //     });
        // });

        var big_data = [];
        var big2_data = [];
        var totalHarga = 0;

        function cekHarga() {
            var a = 0
            var b = 0;
            for (var i = 0; i < big_data.length; i++) {
                a = document.getElementById(big_data[i]).innerText;
                a = Number(a)
                b += a;
            }
            console.log(b);
            document.getElementById("bigTotal").innerHTML = b;
        }

        function save_data(data2, data3) {
            let datapush = data2.replace(/ .*/, '');
            datapush = 'total' + datapush + data3;
            big_data.push(datapush);
            $data2 = data2.replace(/ .*/, '') + data3;
            big2_data.push($data2);
            console.log(datapush);
            console.log("bd", big_data);
            console.log("bd2", big2_data);
            cekHarga();
        }


        function delete_row(rowno) {

            function arrayRemove(arr, value) {

                return arr.filter(function(ele) {
                    return ele != value;
                });
            }
            let temp = 'total' + rowno;
            var result = arrayRemove(big_data, temp);
            big_data = result;
            let temp2 = rowno;
            var result2 = arrayRemove(big2_data, temp2);
            big2_data = result2;

            $('#' + rowno).remove();
            cekHarga();
        }

        $('#jumlah').on('keyup change', function() {
            $value = $('#jumlah').val();
            $namaP = $('#produkList').val();
            var str = $("#produkList option:selected").text();
            var stok = str.split(' ').pop();
            stok = Number(stok);
            var input = document.getElementById("jumlah");
            input.setAttribute("max", stok);
            $harga = $('#harga').val();
            if ($value > stok) {
                document.getElementById("jumlah").value = stok;
                $value = stok
            }
            $.ajax({
                type: 'get',
                url: '{{ URL::to('/admin/input-transaksi/harga') }}',
                data: {
                    'harga': $value,
                    'namaP': $namaP
                },
                success: function(data) {
                    $('#output').html(data);
                }
            });
        });

        $('#transaksi').on('click', function() {
            let token = $("meta[name='csrf-token']").attr("content");

            for (var i = 0; i < big2_data.length; i++) {
                var tr = document.getElementById(big2_data[i]);
                var td = tr.getElementsByTagName("td");
                $nama = td[0].innerHTML;
                $harga = td[1].innerHTML;
                $harga = Number($harga);

                $jumlah = td[2].innerHTML;
                $jumlah = Number($jumlah);

                $total = td[3].innerHTML;
                $total = Number($total);

                console.log("nama", $jumlah, " harga", $total)

                $.ajax({
                    type: 'POST',
                    url: '/admin/tambah',
                    data: {
                        'nama': $nama,
                        'harga': $harga,
                        'jumlah': $jumlah,
                        'total': $total,
                        "_token": "{{ csrf_token() }}"
                    },
                    success: function(data) {

                        window.location.reload()

                    },
                });
                Swal.fire({
                    title: 'Sukses!',
                    text: 'Data transaksi berhasil di input!!',
                    icon: 'succes',
                })
            }
        })
        $('#produkList').on('change', function() {
            var str = $("#produkList option:selected").text();
            var stok = str.split(' ').pop();
            stok = Number(stok);
            var input = document.getElementById("jumlah");
            input.setAttribute("max", stok);

            $value = $('#jumlah').val();
            $namaP = $('#produkList').val();
            $.ajax({
                type: 'get',
                url: '{{ URL::to('/admin/input-transaksi/harga') }}',
                data: {
                    'harga': $value,
                    'namaP': $namaP
                },
                success: function(data) {
                    $('#output').html(data);
                }
            });
        })
        $('#bayar').on('change', function() {
            $value = $('#bayar').val();
            $total = document.getElementById("bigTotal").innerText;
            $total = Number($total)
            $value = Number($value)
            $kembali = $total - $value;
            $('#kembalian').val($value - $total)

        })
        $('#keranjang').on('click', function() {
            $value = $('#jumlah').val();
            $namaP = $('#produkList').val();
            $harga = $('#harga').val();
            $.ajax({
                type: 'get',
                url: '{{ URL::to('/admin/input-transaksi/keranjang') }}',
                data: {
                    'harga': $value,
                    'namaP': $namaP
                },
                success: function(data) {
                    // $('#outputList').html(data);
                    $(data).appendTo($("#outputList"));
                    save_data($namaP, $value);
                }
            });
        })

        $("#nota").on("click", function() {
            var divContents = $("#rincian").html();
            $total = document.getElementById("bigTotal").innerText;
            $total = Number($total);
            $bayar = $('#bayar').val();
            $kembali = $('#kembalian').val();
            $deskripsi = $('textarea#deskripsi').val();
            var printWindow = window.open('', '', 'height=400,width=800');

            printWindow.document.write(`
                 <html>
                        <head>
                            <title>Nota</title>
                        </head>
                    <body>
                        <center>
                            <div style="font-size: 1.5rem; font-weight: bold" >Apotek Elka Farma</div>
                        </center>

                        <br>
                        <div style="margin-top: 40px" >
                            ID. 0090089
                        </div>
                        <div>
                            Padang Cermin, Kec. Padang Cermin, Kabupaten Pesawaran
                        </div>
                        <div>
                            Tgl: 07-02-2022 16.00
                        <div>
                        <hr>`)

            big2_data.forEach(e => {
                printWindow.document.write(`
                        <p>
                            <div>` + e + `</div>
                            <div style="display: flex; justify-content: space-between;">
                                <div>Harga Satuan</div>
                                <div>Jumlah</div>
                                <div>Rp. 103.000</div>
                            </div>
                        </p>
            `)
                printWindow.document.write(`            
                        <hr>
            `)
            });

            printWindow.document.write(`            
                        <p>
                            Total : ` + $total + `
                        </p>
                        <hr>
                        <p>
                            <p>Catatan : </p>
                            <p>
                                ` + $deskripsi + `
                            </p>
                        </p>
                    </body>
                </html>
            `)

            // printWindow.document.write('<html><head><title>Apotek Elka Farma</title>');
            // printWindow.document.write('</head><body >');
            // printWindow.document.write(divContents);

            // printWindow.document.write('<hr><b>Total : Rp </b>', $total, '<br><b>Bayar: Rp </b>', $bayar,
            //     '<br><b>Kembalian: Rp </b>', $kembali, '<br><fieldset>Deskripsi : ', $deskripsi, '</fieldset>');
            // printWindow.document.write('</body></html>');
            printWindow.document.close();
            printWindow.print();
        });
    </script>
@endsection
