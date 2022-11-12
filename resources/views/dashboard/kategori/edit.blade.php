<title>Edit Kategori || Elka Farma</title>
@extends('layouts._dashboard.app')

@section('content')
    <div class="mx-3 mx-sm-4 mt-2">
        @foreach ($kategori as $k)
            <div class="d-inline-flex">
                <a href="{{ route('admin.kategori') }}" class="text-decoration-none text-secondary fs-4">Kategori</a>
                <i class="mt-2 mx-3 fa-solid fa-chevron-right text-dark"></i>
                <a href="/admin/edit-kategori/{{ $k->slug }}" class="text-decoration-none text-dark fw-bold fs-4">Edit
                    Kategori</a>
            </div>
            <h6 class="fs-6 mt-1 mb-4 fw-normal">Halaman Pengelolaan Kategori</h6>

            {{-- Tambah Kategori --}}

            <form action="/admin/update-kategori" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="col-12 col-sm-6 mb-3">
                    <div class="fs-6 mb-1">Nama Obat</div>
                    <input value="{{ $k->nama }}" name="nama" type="text" class="bg-light form-control">
                </div>
                <div class="col-12 col-sm-6 mb-3">
                    <div class="fs-6 mb-1">Upload Gambar</div>
                    <div class="d-flex custom-file-button">
                        <label class="input-group-text bg-secondary text-light px-4" for="inputGroupFile">Choose
                            File</label>
                        <input onchange="loadFile(event)" name="image" type="file"
                            class="form-control border-0 bg-transparent" id="inputGroupFile">
                    </div>
                </div>
                <img id="output" src="/kategori/{{ $k->gambar }}" class="py-3" style="width: 200">
                <input type="text" name="id" hidden value="{{ $k->id }}">
                <br>
                <input type="submit" class="btn btn-danger mb-5 mt-5" value="Update Kategori">
            </form>
        @endforeach
    </div>


    {{-- Style Input Choose File --}}
    <style>
        .custom-file-button input[type=file] {
            margin-left: -2px !important;
        }

        .custom-file-button input[type=file]::-webkit-file-upload-button {
            display: none;
        }

        .custom-file-button input[type=file]::file-selector-button {
            display: none;
        }

        .custom-file-button:hover label {
            cursor: pointer;
        }
    </style>
    {{-- Show Image Script --}}
    <script>
        var loadFile = function(event) {
            var image = document.getElementById('output');
            image.src = URL.createObjectURL(event.target.files[0]);
        };
    </script>
@endsection
