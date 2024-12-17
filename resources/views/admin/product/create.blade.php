@extends('layouts.adminbase')

@section('title', 'Buat Produk')

@section('content')
<div class="main-content-inner">
    <!-- Memulai area baris -->
    <div class="row">
        <div class="col-lg-12 col-ml-12">
            <div class="row">
                <!-- Memulai formulir tabel -->
                <div class="col-12 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title">Buat Produk</h4>
                            <form role="form" action="{{route('admin.product.store')}}" method="POST" enctype="multipart/form-data" class="forms-sample">
                                @csrf
                                <div class="form-group">
                                    <label for="">Kategori Produk</label>
                                    <select name="category_id" class="form-control select2">
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
                                    <label for="exampleInputName1">Detail</label>
                                    <textarea class="form-control" id="detail" name="detail" placeholder="Detail"></textarea>
                                    <script>
                                        ClassicEditor
                                            .create(document.querySelector('#detail'))
                                            .then(editor => {
                                                console.log(editor);
                                            })
                                            .catch(error => {
                                                console.error(error);
                                            });
                                    </script>
                                </div>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" name="price" aria-label="Jumlah (ke rupiah terdekat)">
                                    <div class="input-group-append">
                                        <span class="input-group-text">Rp.</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">Stok</label>
                                    <input type="number" class="form-control" id="exampleInputName1" placeholder="Stok" name="quantity">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">Pajak</label>
                                    <input type="number" class="form-control" id="exampleInputName1" placeholder="Pajak" name="tax">
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
