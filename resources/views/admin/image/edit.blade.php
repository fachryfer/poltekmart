@extends('layouts.adminbase')

@section('title', 'Edit Produk')

@section('content')


<div class="main-content-inner">
    <!-- row area start -->
    <div class="row">
        <div class="col-lg-12 col-ml-12">
            <div class="row">
                <!-- table form start -->
                <div class="col-12 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title">Edit Produk</h4>
                            <form role="form" action="{{route('admin.product.update',['id'=>$data->id])}}" method="post"  enctype="multipart/form-data">

                                @csrf
                                <div class="form-group">
                                    <label for="">Kategori</label>
                                    <select name="category_id" class="form-control select2">
                                        <option value="0" selected="selected"></option>
                                        @foreach($datalist as $rs)
                                        <option value="{{$rs->id}}" @if ($rs->id==$data->category_id) selected="selected" @endif>
                                            {{\App\Http\Controllers\AdminPanel\CategoryController::getParentsTree($rs, $rs->title) }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">Judul</label>
                                    <input type="text" class="form-control" id="exampleInputName1" value="{{$data->title}}" name="title">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">Kata Kunci</label>
                                    <input type="text" class="form-control" id="exampleInputName1" value="{{$data->keywords}}"  name="keywords">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">Deskripsi</label>
                                    <input type="Description" class="form-control" id="exampleInputName1" value="{{$data->description}}" name="description">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">Detail</label>
                                    <input type="Description" class="form-control" id="exampleInputName1" value="{{$data->detail}}" name="detail">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">Harga</label>
                                    <input type="number" class="form-control" id="exampleInputName1" value="{{$data->price}}" name="price">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">Jumlah</label>
                                    <input type="number" class="form-control" id="exampleInputName1" value="{{$data->quantity}}" name="quantity">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">Pajak</label>
                                    <input type="number" class="form-control" id="exampleInputName1" value="{{$data->tax}}" name="tax">
                                </div>
                                <div class="form-group">
                                    <label>Unggah Foto</label>
                                    <div class="input-group col-xs-12">
                                        <label for="formFile" class="form-label"></label>
                                        <input class="form-control" type="file" name="image" id="image">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleSelectGender">Status</label>
                                    <select name="status" class="form-control">
                                        <option selected>{{$data->status}}</option>
                                        <option value="aktif">Aktif</option>
                                        <option value="pasif">Pasif</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-warning me-2">Update Informasi</button>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- table form end -->
            </div>
        </div>
    </div>
    <!-- row area end -->
    <div class="row mt-5">
    </div>
    <!-- row area start-->
</div>
</div>
<!-- main content area end -->
@endsection
