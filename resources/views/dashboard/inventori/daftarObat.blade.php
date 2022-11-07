<link rel="shortcut icon" href="/assets/images/icon.svg" type="image/x-icon">
<title>Daftar Obat || Elka Farma</title>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
@extends('layouts._dashboard.app')

@section('content')
<div class="mx-4 mt-2">
    <div class="d-flex mb-3">
        <div>
            <div class="d-inline-flex">
                <a href="{{ route('admin.daftarObat') }}" class="text-decoration-none text-secondary fs-4">Inventory</a>
                <i class="mt-2 mx-3 fa-solid fa-chevron-right text-dark"></i>
                <a href="{{ route('admin.daftarObat') }}" class="text-decoration-none text-dark fw-bold fs-4">Daftar
                    Obat</a>
            </div>
            <h6 class="fs-6 mt-1 mb-4 fw-normal">Daftar obat yang tersedia di apotik</h6>
        </div>
        <div class="ms-auto mt-3">
            <a href="{{ route('admin.inputObat') }}" class="btn btn-danger">
                <i class="fa-solid fa-plus"></i>
                Tambah Item</a>
        </div>
    </div>
</div>
<div class="mx-4">
    <div class="d-flex">
        <div class="col-5">
            <form class="d-flex mt-2">
                <input id="search" type="text" class="form-control me-2" type="search" placeholder="Search"
                    aria-label="Search">
                <button class="btn btn-outline-success" type="submit"><i
                        class="fa-solid fa-magnifying-glass"></i></button>
            </form>
        </div>
        <div class="d-flex align-items-center col-lg-3 col-sm-4 ms-auto">
            <i class="fa-solid fa-filter me-3" style="font-size: 14pt"></i>
            <select id="jenis" class="form-select form-select-sm" aria-label=".form-select-sm example">
                <option value="" selected>-- Pilih Kategori --</option>
                @foreach ($kategori as $k)
                <option value="{{$k->nama}}" name="{{$k->nama}}">{{$k->nama}}</option>
                @endforeach
            </select>
        </div>
    </div>

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
                    <th scope="col">Aksi</th>

                </tr>
            </thead>
            <!-- <div>

            </div> -->
            <tbody id="tbodyy">

                @foreach ($barang as $b)
                <tr>
                    <th scope="row">{{ $a }}</th>
                    <td>{{ $b->id }} </td>
                    <td>{{ $b->nama }}</td>

                    <td>{{ $b->kategori }}</td>
                    <td>{{ $b->sisa }}</td>
                    <td>
                        <a href="/admin/edit-barang/{{ $b->slug }}" class="btn btn-primary btn-sm">
                            <i class="fa-solid fa-pen text-light"></i>
                        </a>
                        &emsp13;
                        <a class="btn btn-danger btn-sm" href="/admin/daftar-obat/hapus-barang/{{ $b->id }}"
                            onclick="return confirm('Apakah anda yakin ingin menghapus?')">
                            <i class="fa-solid fa-trash-can text-light"></i>
                        </a>
                        &emsp;
                        <a href="/admin/detail-obat/{{ $b->slug }}"
                            style="color: #1D242E; text-decoration: none;">Detail >></a>
                    </td>
                </tr>
                <?php $a++; ?>
                @endforeach
            </tbody>
        </table>

    </div>
</div>
<div class="pagination justify-content-center">
    {{ $barang->links() }}
</div>


<script type="text/javascript">
    $('#search').on('keyup', function () {
        $value = $(this).val();
        $.ajax({
            type: 'get',
            url: '{{URL::to("/admin/daftar-obat/cari")}}',
            data: { 'search': $value },
            success: function (data) {
                $('#tbodyy').html(data);
            }
        });
    })

    $('#jenis').on('change', function () {
        $value = $(this).val();
        $.ajax({
            type: 'get',
            url: '{{URL::to("/admin/daftar-obat/cari")}}',
            data: { 'search': $value },
            success: function (data) {
                $('#tbodyy').html(data);
            }
        });
    })
</script>
<script type="text/javascript">
    $.ajaxSetup({ headers: { 'csrftoken': '{{ csrf_token() }}' } });
</script>

@endsection