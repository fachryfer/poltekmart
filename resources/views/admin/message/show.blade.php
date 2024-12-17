@extends('layouts.adminbase')

@section('title', 'Detail Produk')

@section('content')
<div class="main-content-inner">
    <!-- area baris dimulai -->
    <div class="row">
        <div class="col-lg-12 col-ml-12">
            <div class="row">
                <!-- mulai formulir tabel -->
                <div class="col-lg-12 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title">Detail Pesan</h4>
                            <div class="single-table">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <tr>
                                            <th style="width: 30px">Id</th>
                                            <td>{{$data->id}}</td>
                                        </tr>
                                        <tr>
                                            <th style="width: 30px">Nama</th>
                                            <td>{{$data->name}}</td>
                                        </tr>
                                        <tr>
                                            <th style="width: 30px">Email</th>
                                            <td>{{$data->email}}</td>
                                        </tr>
                                        <tr>
                                            <th style="width: 30px">Telepon</th>
                                            <td>{{$data->phone}}</td>
                                        </tr>
                                        <tr>
                                            <th style="width: 30px">Subjek</th>
                                            <td>{{$data->subject}}</td>
                                        </tr>
                                        <tr>
                                            <th style="width: 30px">Pesan</th>
                                            <td>{{$data->message}}</td>
                                        </tr>
                                        <tr>
                                            <th style="width: 30px">Perbarui Status:</th>
                                            <td>
                                                <form role="form" action="{{route('admin.message.update',['id'=>$data->id])}}" method="POST" class="forms-sample">
                                                    @csrf
                                                    <select name="status" id="">
                                                        <option selected>{{$data->status}}</option>
                                                        <option>Baru</option>
                                                        <option>Dibaca</option>
                                                    </select>
                                                    <div class="card-footer">
                                                        <button type="submit" class="btn-primary">Perbarui Status</button>
                                                    </div>
                                                </form>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Tanggal Dibuat</th>
                                            <td>{{$data->created_at}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Tanggal Terakhir Diperbarui</th>
                                            <td>{{$data->updated_at}}</td>
                                        </tr>
                                        <tr>
                                            <th style="width: 30px">Catatan Admin:</th>
                                            <td>
                                                <form role="form" action="{{route('admin.message.update',['id'=>$data->id])}}" method="POST" class="forms-sample">
                                                    @csrf
                                                    <textarea cols="80" class="textarea" name="note" id="note">
                                                        {{$data->note}}
                                                    </textarea>
                                                    <div class="card-footer">
                                                        <button type="submit" class="btn-primary">Tambahkan Catatan</button>
                                                    </div>
                                                </form>
                                            </td>
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
    <!-- area baris dimulai -->
</div>
</div>
<!-- area konten utama berakhir -->
@endsection
