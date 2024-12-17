@extends('layouts.adminbase')

@section('title', 'Detail Produk')

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
                            <h4 class="header-title">Detail Komentar</h4>
                            <div class="single-table">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <tr>
                                            <th style="width: 30px">Id</th>
                                            <td>{{$data->id}}</td>
                                        </tr>
                                        <tr>
                                            <th style="width: 30px">Produk</th>
                                            <td>{{$data->product->title}}</td>
                                        </tr>
                                        <tr>
                                            <th style="width: 30px">Nama</th>
                                            <td>{{$data->user->name}}</td>
                                        </tr>
                                        <tr>
                                            <th style="width: 30px">Topik</th>
                                            <td>{{$data->subject}}</td>
                                        </tr>
                                        <tr>
                                            <th style="width: 30px">Komentar</th>
                                            <td>{{$data->comment}}</td>
                                        </tr>
                                        <tr>
                                            <th style="width: 30px">Peringkat</th>
                                            <td>{{$data->rate}}</td>
                                        </tr>
                                        <tr>
                                            <th style="width: 30px">Status</th>
                                            <td>{{$data->status}}</td>
                                        </tr>
                                        <tr>
                                            <th style="width: 30px">Tanggal Dibuat</th>
                                            <td>{{$data->created_at}}</td>
                                        </tr>
                                        <tr>
                                            <th style="width: 30px">Tanggal Terakhir Diperbarui</th>
                                            <td>{{$data->updated_at}}</td>
                                        </tr>
                                        <tr>
                                            <th style="width: 30px">Pembaruan Status:</th>
                                            <td>
                                                <form role="form" action="{{route('admin.comment.update',['id'=>$data->id])}}" method="POST" class="forms-sample">
                                                    @csrf
                                                    <select name="status" id="">
                                                        <option selected>{{$data->status}}</option>
                                                        <option>Belum Dibaca</option>
                                                        <option>Dibaca</option>
                                                    </select>
                                                    </textarea>
                                                    <div class="card-footer">
                                                        <button type="submit" class="btn-primary">Perbarui Status</button>
                                                    </div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- formulir tabel selesai -->
            </div>
        </div>
    </div>
    <!-- area baris selesai -->
    <div class="row mt-5">
    </div>
    <!-- area baris dimulai -->
</div>
</div>
<!-- area konten utama selesai -->
@endsection
