<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
@extends('dashboard.laporan')

@section('title')
<a href="" class="text-dark fw-bold fs-4 text-decoration-none">Barang Sisa</a>
@endsection

@section('table')
{{-- Table --}}
<?php $a = 1;
    $hal = $barang->currentPage();
    ?>
<div class="mt-3 mx-1 p-2 bg-white over" id="rincian">
    <div class="row px-4 w-table ">

        <table id="isi" class="table table-hover table-responsive text-center" style="color: #656a6e">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">ID Produk</th>
                    <th scope="col">Produk</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Stok</th>
                </tr>
            </thead>
            <tbody id="output">
                @foreach ($barang as $b)
                <tr>
                    <th scope="row">{{ ($hal - 1) * 8 + $a }}</th>
                    <td>{{ $b->id }}</td>
                    <td>{{ $b->nama }}</td>
                    <td>{{ $b->kategori }}</td>
                    @if ($b->sisa < $b->minimal)
                        <td style="color: #F0483E"><b>{{ $b->sisa }}</b></td>
                        @else
                        <td>{{ $b->sisa }}</td>
                        @endif
                </tr>
                <?php $a++; ?>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
<div class="d-flex my-4 ms-3">
    <div style="background-color: F0483E; height: 30px; width: 30px; border-radius: 5px"></div>
    <div style="margin-left: 10px;"> Stok Barang Minim</div>
</div>
<div id="paginasi" class="pagination justify-content-center mb-4">
    {{ $barang->links() }}
</div>

<style>
    @media(max-width: 1160px) {
        .over {
            overflow-x: auto;
        }

        .w-table {
            width: 1000px;
        }
    }
</style>

<script type="text/javascript">
    $("#nota").on("click", function () {
        var title = "Laporan Barang Sisa"

        const months = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September",
            "Oktober", "November", "Desember"
        ];

        var today = new Date();
        today = String(today.getDate()).padStart(2, '0') + ' ' +
            String(months[today.getMonth()]).padStart(2, '0') + ' ' +
            today.getFullYear();

        var divContents = $("#rincian").html();
        var htmlToPrint = '' +
            '<style type="text/css">' +
            'table, th, td {' +
            'border:1px solid;' +
            'border-collapse:collapse;' +
            'padding:0.8em;' +
            '}' +
            'body {' +
            'align-self:center;' +
            '}' +
            '</style>';
        htmlToPrint += divContents;
        var printWindow = window.open('', '', 'height=800,width=1600');

        printWindow.document.write(
            `
                <html>
                        <head>
                            <title>` + title + `</title>
                        </head>
                    <body>
                        <center>
                            <p style="font-size: 1.4rem; font-weight: bold;">
                                Apotek Elka Farma
                            </p>
                            <div style="font-size: 1.6rem; font-weight: bold; margin-bottom: 0.5rem;" >
                                ` + title + `
                            </div>
                            <div style="margin-bottom: 3rem;" >
                                Periode : 07/02/2022 - 07/02/2023
                            </div>
                        </center>
            `)

        printWindow.document.write(`<center>` + htmlToPrint + `</center>`);

        printWindow.document.write(`
                        <div style="display: flex; margin-top: 3rem;" >
                            <div style="margin-left: auto; margin-right: 2rem;" >
                                <div style="margin-bottom: 5rem;" >
                                    Bandar Lampung, ` + today + `
                                </div>
                                <div style="text-align: center;" >
                                    (Benni Ginting)
                                </div>
                            </div>
                        </div>
                    </body>
                    </html>
                    <style>
                        body{
                            padding-top: 30px;
                        }
                        @page {
                            margin: 0;
                        }
                    </style>
                `)
        printWindow.document.close();
        printWindow.print();
    });
    $('#tampil').on('click', function () {
        var tanggal2 = $('#tanggal2').val();
        var tanggal1 = $('#tanggal1').val();
        console.log(typeof (tanggal2))
        console.log(tanggal1)
        $.ajax({
            type: 'get',
            url: '{{ URL::to(' / admin / laporan - barang - masuk / sort') }}',
            data: {
                'tanggal1': tanggal1,
                'tanggal2': tanggal2,
            },
            success: function (data) {
                $('#output').html(data);
                console.log('Sukses')
            },

        });
    });
    $('#tampilMinim').on('click', function () {
        $value = $(this).val();
        $.ajax({
            type: 'get',
            url: '{{ URL::to(' / admin / laporan - barang - sisa / minim') }}',
            data: {
                'search': $value,
            },
            success: function (data) {
                $('#output').html(data);
                $("#paginasi").hide();
            }
        });
    })
</script>
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'csrftoken': '{{ csrf_token() }}'
        }
    });
</script>
@endsection