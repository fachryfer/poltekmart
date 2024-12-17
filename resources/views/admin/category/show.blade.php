@extends('layouts.adminbase')

@section('title', 'POLTEKMART | ADMIN PANEL')

@section('content')
<div class="main-content-inner">
    <!-- area baris dimulai -->
    <div class="row">
        <div class="col-lg-12 col-ml-12">
            <div class="row">
                <!-- formulir tabel dimulai -->
                <div class="col-lg-12 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title">Baris yang Dapat Diarahkan</h4>
                            <div class="single-table">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <tr>
                                            <th scope="col">ID</th>
                                            <td>{{$data->id}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Kategori Induk</th>
                                            <td>{{\App\Http\Controllers\AdminPanel\CategoryController::getParentsTree($data, $data->title) }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Judul</th>
                                            <td>{{$data->title}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Kata Kunci</th>
                                            <td>{{$data->keywords}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Deskripsi</th>
                                            <td>{{$data->description}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Foto</th>
                                            <td>
                                                @if ($data->image)
                                                <img src="{{Storage::url($data->image)}}" style="height:150px ;width:150px; border-radius:2px">
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Tanggal Pembuatan</th>
                                            <td>{{$data->created_at}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Tanggal Pembaharuan Terakhir</th>
                                            <td>{{$data->updated_at}}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- formulir tabel berakhir -->
            </div>
        </div>
    </div>
    <!-- area baris berakhir -->
    <div class="row mt-5">
    </div>
    <!-- area baris dimulai-->
</div>
</div>
<!-- area konten utama berakhir -->
@endsection
