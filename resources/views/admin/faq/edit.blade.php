@extends('layouts.adminbase')

@section('title', 'Edit Produk')

@section('content')


<div class="main-content-inner">
    <!-- area baris dimulai -->
    <div class="row">
        <div class="col-lg-12 col-ml-12">
            <div class="row">
                <!-- formulir tabel dimulai -->
                <div class="col-12 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title">Edit Produk</h4>
                            <form role="form" enctype="multipart/form-data" action="{{route('admin.faq.update',['id'=>$data->id])}}" method="POST" class="forms-sample">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputName1">Pertanyaan</label>
                                    <input type="text" class="form-control" id="exampleInputName1" placeholder="Pertanyaan" name="question" value="{{$data->question}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">Jawaban</label>
                                    <textarea class="form-control" id="detail" name="answer" placeholder="Jawaban">
                                    {{$data->answer}}
                                    </textarea>
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
                                
                                <button type="submit" class="btn btn-primary me-2">Perbarui Data</button>
                            </form>
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
