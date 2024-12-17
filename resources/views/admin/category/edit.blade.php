@extends('layouts.adminbase')

@section('title', 'Panel Admin İz Market')

@section('content')
    <div class="main-content-inner">
        <!-- Mulai daerah baris -->
        <div class="row">
            <div class="col-lg-12 col-ml-12">
                <div class="row">
                    <!-- Mulai formulir tabel -->
                    <div class="col-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">Edit Kategori</h4>
                                <form role="form" action="{{route('admin.category.update',['id'=>$data->id])}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="">Kategori Induk</label>
                                        <select name="parent_id" class="form-control select2">
                                            <option value="0" selected="selected"></option>
                                            @foreach($datalist as $rs)
                                                <option value="{{$rs->id}}"> {{\App\Http\Controllers\AdminPanel\CategoryController::getParentsTree($rs, $rs->title) }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputName1">Judul</label>
                                        <input type="text" class="form-control" id="exampleInputName1" value="{{$data->title}}" name="title">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputName1">Kata Kunci</label>
                                        <input type="text" class="form-control" id="exampleInputName1" value="{{$data->keywords}}" name="keywords">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputName1">Deskripsi</label>
                                        <input type="Description" class="form-control" id="exampleInputName1" value="{{$data->description}}" name="description">
                                    </div>
                                    <div class="form-group">
                                        <label>Unggah Foto</label>
                                        <div class="input-group col-xs-12">
                                            <label for="formFile" class="form-label"></label>
                                            <input class="form-control" type="file" name="image" id="image">
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-warning me-2">Update Informasi</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Akhir formulir tabel -->
                </div>
            </div>
        </div>
        <!-- Akhir daerah baris -->
        <div class="row mt-5">
        </div>
        <!-- Mulai daerah baris -->
    </div>
</div>
<!-- Akhir daerah konten utama -->
@endsection
