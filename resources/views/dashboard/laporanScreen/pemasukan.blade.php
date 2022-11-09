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
<div class="row mt-3 mx-1 p-2 bg-white" id="rincian">
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
                <th scope="row">{{ (($hal-1) * 8) + $a }}</th>
                <td>{{$l->tanggal}}</td>
                <td>{{$l->total}}</td>
            </tr>
            <?php $a++; ?>
            @endforeach
        </tbody>
    </table>
</div>
<div id="paginasi" class="pagination justify-content-center">
    {{ $laporan->links() }}
</div>
<script type="text/javascript">
    $("#nota").on("click", function () {
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
        printWindow.document.write('<html><head><h4>Barang Sisa</h4>');
        printWindow.document.write('</head><body >');
        printWindow.document.write(htmlToPrint);

        printWindow.document.write('</body></html>');
        printWindow.document.close();
        printWindow.print();
    });
    $('#tampil').on('click', function () {
        var tanggal2 = $('#tanggal2').val();
        var tanggal1 = $('#tanggal1').val();
        // $tanggal2 = new Date(tanggal2);
        // $tanggal1 = new Date(tanggal1);
        console.log(typeof (tanggal2))
        console.log(tanggal1)
        $.ajax({
            type: 'get',
            url: '{{URL::to("/admin/laporan-pemasukan/sort")}}',
            data: {
                'tanggal1': tanggal1, 'tanggal2': tanggal2,
            },
            success: function (data) {
                $('#output').html(data);
                console.log('Sukses')
                $("#paginasi").hide();
            },

        });
    });


</script>

<script type="text/javascript">
    $.ajaxSetup({ headers: { 'csrftoken': '{{ csrf_token() }}' } });
</script>
@endsection