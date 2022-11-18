<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
@extends('dashboard.laporan')

@section('title')
    <a href="" class="text-dark fw-bold fs-4 text-decoration-none">Pemasukan</a>
@endsection

@section('table')
    {{-- Table --}}

    <?php $a = 1;
    $hal = $laporan->currentPage();
    ?>
    <div class="mt-3 mx-1 p-2 bg-white over" id="rincian">
        <div class="row px-4 w-table ">
            <table class="table table-hover table-responsive text-center" style="color: #656a6e">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Total (Rp )</th>
                    </tr>
                </thead>
                <tbody id="output">
                    @foreach ($laporan as $l)
                        <tr>
                            <th scope="row">{{ ($hal - 1) * 8 + $a }}</th>
                            <td>{{ date('d/m/Y', strtotime($l->tanggal)) }}</td>
                            <td>{{ $l->total }}</td>
                        </tr>
                        <?php $a++; ?>
                    @endforeach
                </tbody>

                <input type="hidden" id="tgl1"
                    value="{{ date('d/m/Y', strtotime($laporan[count($laporan) - 1]->tanggal)) }}">
                <input type="hidden" id="tgl2" value="{{ date('d/m/Y', strtotime($laporan[0]->tanggal)) }}">
            </table>
        </div>
    </div>
    <div id="paginasi" class="pagination justify-content-center my-3">
        {{ $laporan->links() }}
    </div>

    <style>
        @media(max-width: 1160px) {
            .over {
                overflow-x: auto;
            }

            .w-table {
                width: 800px;
            }
        }
    </style>

    <script type="text/javascript">
        $("#nota").on("click", function() {
            var title = "Laporan Pemasukan";
            var tanggal2 = $('#tanggal2').val();
            var tanggal1 = $('#tanggal1').val();

            if (tanggal1 == "") {
                tanggal2 = $('#tgl2').val();
                tanggal1 = $('#tgl1').val();
            }

            console.log(tanggal1);

            // Tanggal sekarang
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
                'padding-inline:5em;' +
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
                                Periode : ` + tanggal1 + ` - ` + tanggal2 + `
                            </div>
                        </center>
            `)

            printWindow.document.write(`<center>` + htmlToPrint + `</center>`);

            printWindow.document.write(`
                        <div style="display: flex; margin-top: 3rem;" >
                            <div style="margin-left: auto; margin-right: 2rem;" >
                                <div style="margin-bottom: 5rem;" >
                                    Pesawaran, ` + today + `
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
        $('#tampil').on('click', function() {
            var tanggal2 = $('#tanggal2').val();
            var tanggal1 = $('#tanggal1').val();
            // $tanggal2 = new Date(tanggal2);
            // $tanggal1 = new Date(tanggal1);
            var parts = tanggal1.split('/');
            var mydate1 = (parts[2]) + '-' + (parts[1]) + '-' + parts[0];
            var parts2 = tanggal2.split('/');
            var mydate2 = (parts2[2]) + '-' + (parts2[1]) + '-' + parts2[0];
            // console.log(typeof (tanggal2))
            console.log(mydate1)
            $.ajax({
                type: 'get',
                url: "{{ URL::to('/admin/laporan-pemasukan/sort') }}",
                data: {
                    'tanggal1': mydate1,
                    'tanggal2': mydate2,
                },
                success: function(data) {
                    $('#output').html(data);
                    console.log('Sukses')
                    $("#paginasi").hide();
                },

            });
        });
    </script>

    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'csrftoken': '{{ csrf_token() }}'
            }
        });
    </script>
@endsection
