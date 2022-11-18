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
    $.ajaxSetup({
        headers: {
            'csrftoken': '{{ csrf_token() }}'
        }
    });
</script>
<script src="/script/pemasukan.js"></script>
@endsection