@extends('layouts.adminbase')

@section('title', 'Panel Admin Iz Market')

@section('content')
    <div class="main-content-inner">
        <!-- area baris start -->
        <div class="row">
            <div class="col-lg-12 col-ml-12">
                <div class="row">
                    <!-- formulir tabel start -->
                    <div class="col-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">Buat Kategori</h4>
                                <form role="form" action="{{route('admin.category.store')}}" method="POST" enctype="multipart/form-data" class="forms-sample">
                                    @csrf
                                    <div class="form-group">
                                        <label for="">Kategori Induk</label>
                                        <select name="parent_id" class="form-control select2">
                                            <option value="0" selected="selected">Kategori Utama</option>
                                            @foreach($data as $rs)
                                                <option value="{{$rs->id}}"> {{\App\Http\Controllers\AdminPanel\CategoryController::getParentsTree($rs, $rs->title) }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputName1">Judul</label>
                                        <input type="text" class="form-control" id="exampleInputName1" placeholder="Judul" name="title">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputName1">Kata Kunci</label>
                                        <input type="text" class="form-control" id="exampleInputName1" placeholder="Kata Kunci" name="keywords">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputName1">Deskripsi</label>
                                        <input type="Description" class="form-control" id="exampleInputName1" placeholder="Deskripsi" name="description">
                                    </div>
                                    <div class="form-group">
                                        <label>Unggah Foto</label>
                                        <div class="input-group col-xs-12">
                                            <label for="formFile" class="form-label"></label>
                                            <input class="form-control" type="file" name="image" id="image">
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-warning me-2">Buat</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- formulir tabel end -->
                </div>
            </div>
        </div>
        <!-- area baris end -->
        <div class="row mt-5">
        </div>
        <!-- area baris start-->
    </div>
    <!-- area konten utama end -->
@endsection
