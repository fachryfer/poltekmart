@extends('layouts.adminbase')

@section('title', 'Detail Produk')

@section('content')
<div class="main-content-inner">
    <!-- Mulai area baris -->
    <div class="row">
        <div class="col-lg-12 col-ml-12">
            <div class="row">
                <!-- Mulai formulir tabel -->
                <div class="col-lg-12 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title">Detail Produk</h4>
                            <div class="single-table">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <tr>
                                            <th scope="col">ID</th>
                                            <td>{{$data->id}}</td>
                                        </tr>
                                        <tr>
                                            <th>Kategori</th>
                                            <td>
                                                {{\App\Http\Controllers\AdminPanel\CategoryController::getParentsTree($data->category, $data->category->title) }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Judul</th>
                                            <td>{{$data->title}}</td>
                                        </tr>
                                        <tr>
                                            <th>Kata Kunci</th>
                                            <td>{{$data->keywords}}</td>
                                        </tr>
                                        <tr>
                                            <th>Deskripsi</th>
                                            <td>{{$data->description}}</td>
                                        </tr>
                                        <tr>
                                            <th>Detail</th>
                                            <td>{{$data->detail}}</td>
                                        </tr>
                                        <tr>
                                            <th>Harga</th>
                                            <td>{{$data->price}}</td>
                                        </tr>
                                        <tr>
                                            <th>Stok</th>
                                            <td>{{$data->quantity}}</td>
                                        </tr>
                                        <tr>
                                            <th>Pajak</th>
                                            <td>%{{$data->tax}}</td>
                                        </tr>
                                        <tr>
                                            <th>Foto</th>
                                            <td>
                                                @if ($data->image)
                                                <img src="{{Storage::url($data->image)}}" style="height:150px ;width:150px; border-radius:2px">
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Status</th>
                                            <td>{{$data->status}}</td>
                                        </tr>
                                        <tr>
                                            <th>Tanggal Pembuatan</th>
                                            <td>{{$data->created_at}}</td>
                                        </tr>
                                        <tr>
                                            <th>Tanggal Terakhir Diperbarui</th>
                                            <td>{{$data->updated_at}}</td>
                                        </tr>
                                    </table>
                                    <a class="btn btn-warning" style="color: white;" href="{{route('admin.product.edit',['id'=>$data->id])}}">Edit</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Akhir formulir tabel -->
            </div>
        </div>
    </div>
    <!-- Akhir area baris -->
    <div class="row mt-5">
    </div>
    <!-- Mulai area baris -->
</div>
</div>
<!-- Akhir area konten utama -->
@endsection
