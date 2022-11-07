<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
@extends('dashboard.laporan')

@section('title')
<a href="" class="text-dark fw-bold fs-4 text-decoration-none">Pemasukan</a>
@endsection

@section('table')
{{-- Table --}}

<?php $a = 1; ?>
<div class="row mt-3 mx-1 p-2 bg-white">
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
                <th scope="row">{{ $a }}</th>
                <td>{{$l->tanggal}}</td>
                <td>{{$l->total}}</td>
            </tr>
            <?php $a++; ?>
            @endforeach
        </tbody>
    </table>
</div>
<div class="pagination justify-content-center">
    {{ $laporan->links() }}
</div>
<script type="text/javascript">
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
            },

        });
    });


</script>

<script type="text/javascript">
    $.ajaxSetup({ headers: { 'csrftoken': '{{ csrf_token() }}' } });
</script>
@endsection