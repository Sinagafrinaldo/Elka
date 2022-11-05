<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
@extends('dashboard.laporan')

@section('title')
<a href="" class="text-dark fw-bold fs-4 text-decoration-none">Barang Sisa</a>
@endsection

@section('table')
{{-- Table --}}
<?php $a = 1; ?>
<div class="row mt-3 mx-1 p-2 bg-white">
    <table class="table table-hover table-responsive text-center" style="color: #656a6e">
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
                <th scope="row">{{ $a }}</th>
                <td>{{$b->id}}</td>
                <td>{{$b->nama}}</td>
                <td>{{$b->kategori}}</td>
                @if ($b->sisa < $b->minimal)
                    <td style="color: #F0483E"><b>{{$b->sisa}}</b></td>
                    @else
                    <td>{{$b->sisa}}</td>
                    @endif
            </tr>



            <?php $a++; ?>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex">
        <div style="background-color: F0483E; height: 30px; width: 30px; border-radius: 5px"></div>
        <div style="margin-left: 10px;"> Stok Barang Minim</div>
    </div>
</div>
<div class="pagination justify-content-center">
    {{ $barang->links() }}
</div>

<script type="text/javascript">


    $('#tampilMinim').on('click', function () {
        $value = $(this).val();
        $.ajax({
            type: 'get',
            url: '{{URL::to("/admin/laporan-barang-sisa/minim")}}',
            data: { 'search': $value },
            success: function (data) {
                $('#output').html(data);
            }
        });
    })
</script>
<script type="text/javascript">
    $.ajaxSetup({ headers: { 'csrftoken': '{{ csrf_token() }}' } });
</script>
@endsection