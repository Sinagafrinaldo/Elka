<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
@extends('dashboard.laporan')

@section('title')
<a href="" class="text-dark fw-bold fs-4 text-decoration-none">Barang Masuk</a>
@endsection

@section('table')
{{-- Table --}}
<?php $a = 1;
    $hal = $barang->currentPage();
    ?>
<div class="mt-3 mx-1 p-2 bg-white over" id="rincian">
    <div class="row px-4 w-table ">
        <table class="table table-hover table-responsive text-center" style="color: #656a6e">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">ID Produk</th>
                    <th scope="col">Produk</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Suplier</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Jumlah</th>
                </tr>
            </thead>
            <tbody id="output">
                @foreach ($barang as $b)
                <tr>
                    <th scope="row">{{ ($hal - 1) * 8 + $a }}</th>
                    <td> {{ $b->id }} </td>
                    <td>{{ $b->nama }}</td>
                    <td>{{ $b->kategori }}</td>
                    <td>{{ $b->suplier }}</td>
                    <td>{{ date('d/m/Y', strtotime($b->tanggal)) }}</td>
                    <td>{{ $b->jumlah }}</td>
                </tr>
                <?php $a++; ?>
                @endforeach
            </tbody>

            <input type="hidden" id="tgl1" value="{{ date('d/m/Y', strtotime($barang[count($barang) - 1]->tanggal)) }}">
            <input type="hidden" id="tgl2" value="{{ date('d/m/Y', strtotime($barang[0]->tanggal)) }}">
        </table>
    </div>
</div>
<div id="paginasi" class="pagination justify-content-center my-4">
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
    $.ajaxSetup({
        headers: {
            'csrftoken': '{{ csrf_token() }}'
        }
    });
</script>
<script src="/script/bMasuk.js"></script>
@endsection