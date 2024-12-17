@extends('layouts.adminbase')

@section('title', 'Produk Iz Market')

@section('content')
<div class="main-content-inner">
    <!-- Memulai area baris -->
    <div class="row">
        <div class="col-lg-12 col-ml-12">
            <div class="row">
                <!-- Memulai formulir tabel -->
                <div class="col-lg-12 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">{{$product->title}}</h4>
                            <form role="form" action="{{route('admin.image.store',['sid'=>$product->id])}}" method="POST" enctype="multipart/form-data" class="forms-sample">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputName1">Judul</label>
                                    <input type="text" class="form-control" id="exampleInputName1" placeholder="Judul" name="title">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlFile1">Unggah Berkas</label>
                                    <input type="file" class="form-control-file" id="exampleFormControlFile1" name="image">
                                </div>
                                <button type="submit" class="btn btn-primary">Unggah</button>
                            </form>
                            <div class="table-responsive pt-4">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>
                                                Id
                                            </th>
                                            <th>
                                                Judul
                                            </th>
                                            <th>
                                                Foto
                                            </th>
                                            <th>
                                                Hapus
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($images as $rs)
                                        <tr>
                                            <td>{{$rs->id}}</td>
                                            <td>{{$rs->title}}</td>
                                            <td>
                                                @if ($rs->image)
                                                <img src="{{Storage::url($rs->image)}}" style="height:250px ;width:250px; border-radius:2px">
                                                @endif
                                            </td>
                                            <td><a class="btn btn-danger" style="color: white;" href="{{route('admin.image.delete',['sid'=>$product->id,'id'=>$rs->id])}}" , onclick="return confirm('Yakin ingin menghapus ?')">Hapus</a></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
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
    <!-- Memulai area baris -->
</div>
</div>
<!-- Akhir area konten utama -->
@endsection
