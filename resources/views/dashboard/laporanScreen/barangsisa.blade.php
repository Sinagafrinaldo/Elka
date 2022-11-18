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
<script src="/script/bSisa.js"></script>
@endsection