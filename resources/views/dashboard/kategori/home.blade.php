<title>Kategori || Elka Farma</title>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

@extends('layouts._dashboard.app')

@section('content')
<?php $a = 1;
        $hal = $kategori->currentPage();
        ?>
<div class="mx-4 mt-2">
    <div class="d-flex flex-column flex-md-row mb-3">
        <div>
            <div class="d-inline-flex">
                <a href="{{ route('admin.kategori') }}" class="text-decoration-none text-dark fw-bold fs-4">Kategori</a>
            </div>
            <h6 class="fs-6 mt-1 mb-4 fw-normal">Halaman Pengelolaan Kategori</h6>
        </div>
        <div class="ms-auto mt-3">
            <a href="{{ route('admin.inputKategori') }}" class="btn btn-danger">
                <i class="fa-solid fa-plus"></i>
                Tambah Kategori</a>
        </div>
    </div>
</div>
<div class="mx-4">

    {{-- Table --}}

    <div class="mt-3 mx-1 p-2 bg-white over">
        <div class="row px-4 w-table ">
            <table class="table table-hover text-center" style="color: #656a6e">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Kategori</th>
                        <th scope="col">Aksi</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($kategori as $k)
                    <tr>
                        <th scope="row">{{ ($hal - 1) * 8 + $a }}</th>
                        <td>{{ $k->nama }} </td>
                        <td>
                            <a href="/admin/edit-kategori/{{ $k->slug }} " class="btn btn-primary btn-sm">
                                <i class="fa-solid fa-pen text-light"></i>
                            </a>
                            {{-- <a class="btn btn-danger btn-sm" href="/admin/kategori/hapus-kategori/{{ $k->id }}"
                                onclick="return confirm('Apakah anda yakin ingin menghapus?')">
                                <i class="fa-solid fa-trash-can text-light"></i>
                            </a> --}}
                            <a class="btn btn-danger btn-sm delete" href="#" data-id="{{ $k->id }}"
                                data-nama="{{ $k->nama }}">
                                <i class="fa-solid fa-trash-can text-light"></i>
                            </a>
                        </td>
                    </tr>
                    <?php $a++; ?>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</div>
<div class="pagination justify-content-center py-5">
    {{ $kategori->links() }}
</div>

<style>
    @media(max-width: 1160px) {
        .over {
            overflow-x: auto;
        }

        .w-table {
            width: 500px;
        }
    }
</style>
<script type="text/javascript">
    $('.delete').on('click', function () {
        var $id = $(this).attr('data-id');
        var $nama = $(this).attr('data-nama');

        swal({
            title: "Delete Data ?",
            text: "Anda akan menghapus kategori " + $nama + " dari database",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    window.location = "/admin/kategori/hapus-kategori/" + $id;
                    swal("Data berhasil dihapus", {
                        icon: "success",
                    });
                }
            });
    });
</script>
@endsection