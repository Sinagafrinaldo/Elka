@extends('user.navbar')

@section('content')
    <div class="container pt-5 pb-5">
        <div class="container d-flex mb-3">
            <form class="d-flex ms-auto w-50" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-primary" type="submit">Search</button>
            </form>
        </div>

        <div class="container">
            <div class="table-responsive">
                <table class="table table-striped table-bordered align-middle">
                    <thead class="table-primary">
                        <th>No</th>
                        <th>Nama Obat</th>
                        <th>Jumlah Stok</th>
                    </thead>
                    <tbody>
                        <tr class="fs-6">
                            <td>1</td>
                            <td>
                                <img src="./assets/1.jpg" alt="" width="100px">
                                <span class="ms-4"> Paramex</span>
                            </td>
                            <td>5 tablet</td>
                        </tr>
                        <tr class="fs-6">
                            <td>2</td>
                            <td>
                                <img src="./assets/1.jpg" alt="" width="100px">
                                <span class="ms-4"> Paramex</span>
                            </td>
                            <td>5 tablet</td>
                        </tr>
                        <tr class="fs-6">
                            <td>3</td>
                            <td>
                                <img src="./assets/1.jpg" alt="" width="100px">
                                <span class="ms-4"> Paramex</span>
                            </td>
                            <td>5 tablet</td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
