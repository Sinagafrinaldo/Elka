<link rel="shortcut icon" href="/assets/images/icon.svg" type="image/x-icon">
<title>Kadaluarsa || Elka Farma</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
@extends('layouts._dashboard.app')

@section('content')
<?php $a = 1;
    $hal = $kadaluarsa->currentPage();
    ?>
<div class="mx-4 mt-2">
    <h4 class="mb-4">Barang Kadaluarsa</h4>
    <div class="row">
        <div class="col-12 col-md-6">
            <form class="d-flex mt-2">
                <input id="search" class="form-control me-sm-2" type="search" placeholder="Search" aria-label="Search">

            </form>
        </div>
        <div class="d-flex align-items-center col-8 col-sm-5 col-lg-3 ms-auto">
            <i class="fa-solid fa-filter me-3" style="font-size: 14pt"></i>
            <select id="jenis" class="form-select form-select-sm" aria-label=".form-select-sm example">
                <option value="" selected>-- Pilih Kategori --</option>
                @foreach ($kategori as $k)
                <option value="{{ $k->nama }}" name="{{ $k->nama }}">{{ $k->nama }}</option>
                @endforeach
            </select>
        </div>
    </div>

    {{-- Table --}}
    <div class="mt-3 mx-1 p-2 bg-white over">
        <div class="row px-4 w-table">
            <table class="table table-hover table-responsive text-center" style="color: #656a6e">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">ID Produk</th>
                        <th scope="col">Produk</th>
                        <th scope="col">Jenis Produk</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Jumlah</th>
                    </tr>
                </thead>
                <tbody id="produk">
                    @foreach ($kadaluarsa as $b)
                    <tr>
                        <th scope="row">{{ ($hal - 1) * 8 + $a }}</th>
                        <td>{{ $b->id }}</td>
                        <td>{{ $b->nama }}</td>
                        <td>{{ $b->kategori }}</td>
                        <td>{{ date('d/m/Y', strtotime($b->kadaluarsa)) }}</td>
                        <td>{{ $b->sisa }}</td>
                    </tr>
                    <?php $a++; ?>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<div id="paginasi" class="pagination justify-content-center mb-4">
    {{ $kadaluarsa->links() }}
</div>

<style>
    select {
        cursor: pointer;
    }
</style>
<style>
    @media(max-width: 1160px) {
        .over {
            overflow-x: auto;
        }

        .w-table {
            width: 900px;
        }
    }
</style>


<script type="text/javascript">
    $('#search').on('keyup', function () {
        $value = $(this).val();
        $.ajax({
            type: 'get',
            url: '{{ URL::to("/admin/kadaluarsa/cari") }}',
            data: {
                'search': $value
            },
            success: function (data) {
                $('#produk').html(data);
            }
        });
    })

    $('#jenis').on('change', function () {
        $value = $(this).val();

        $.ajax({
            type: 'get',
            url: '{{ URL::to("/admin/kadaluarsa/filter") }}',
            data: {
                'search': $value
            },
            success: function (data) {
                $('#produk').html(data);
                if ($value == "") {
                    $("#paginasi").show();
                } else {


                    $("#paginasi").hide();
                }
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