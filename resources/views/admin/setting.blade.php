@extends('layouts.adminbase')

@section('title', 'POLTEKMART | ADMIN PANEL')

@section('content')
<div class="main-content-inner">
    <div class="col-lg-12 mt-5">
        <div class="card">
            <div class="card-body">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link" id="umum-tab" data-toggle="tab" href="#umum" role="tab" aria-controls="umum" aria-selected="false">Umum</a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" id="social-tab" data-toggle="tab" href="#social" role="tab" aria-controls="social" aria-selected="false">Media Sosial</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="about-tab" data-toggle="tab" href="#about" role="tab" aria-controls="about" aria-selected="false">Tentang Kami</a>
                    </li>
                </ul>
                <form role="form" action="{{route('admin.settingupdate')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="tab-content mt-3" id="myTabContent">
                        <div class="tab-pane fade" id="umum" role="tabpanel" aria-labelledby="umum-tab">
                            <input type="hidden" id="id" name="id" value="{{$data->id}}" class="form-control">
                            <div class="form-group">
                                <label for="exampleInputName1">Judul</label>
                                <input type="text" class="form-control" id="exampleInputName1" id="title" name="title" value="{{$data->title}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Kata Kunci</label>
                                <input type="text" class="form-control" id="exampleInputName1" name="keywords" value="{{$data->keywords}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Deskripsi</label>
                                <input type="Description" class="form-control" id="exampleInputName1" name="description" value="{{$data->description}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Perusahaan</label>
                                <input type="Description" class="form-control" id="exampleInputName1" name="company" value="{{$data->company}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Alamat</label>
                                <input type="Description" class="form-control" id="exampleInputName1" name="adress" value="{{$data->adress}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Telepon</label>
                                <input type="Description" class="form-control" id="exampleInputName1" name="phone" value="{{$data->phone}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Alamat Email</label>
                                <input type="Description" class="form-control" id="exampleInputName1" name="email" value="{{$data->email}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Ikon</label>
                                <div class="custom-file">
                                    <input type="file" name="icon" class="custom-file-input" id="inputGroupFile02">
                                    <label class="custom-file-label" for="inputGroupFile02">Pilih File</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Jam Kerja</label>
                                <input type="text" class="form-control" id="exampleInputName1" name="opentime" value="{{$data->opentime}}">
                            </div>
                        </div>
                        <div class="tab-pane fade" id="social" role="tabpanel" aria-labelledby="social-tab">
                            <div class="form-group">
                                <label for="exampleInputName1">Facebook</label>
                                <input type="text" class="form-control" id="exampleInputName1" name="facebook" value="{{$data->facebook}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Instagram</label>
                                <input type="text" class="form-control" id="exampleInputName1" name="instagram" value="{{$data->instagram}}">
                            </div>
                            <div class="form-group">
                                <label for="inputPassword" class="">Twitter</label>
                                <input type="text" class="form-control" id="exampleInputName1" name="twitter" value="{{$data->twitter}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Youtube</label>
                                <input type="text" class="form-control" id="exampleInputName1" name="youtube" value="{{$data->youtube}}">
                            </div>
                        </div>
                        <div class="tab-pane fade" id="about" role="tabpanel" aria-labelledby="about-tab">
                            <div class="form-group">
                                <label for="exampleInputName1">Tentang Kami</label>
                                <textarea class="form-control" id="aboutus" name="aboutus" value="{{$data->aboutus}} placeholder="Tentang Kami">
                                {{$data->aboutus}}
                                </textarea>
                                <script>
                                    ClassicEditor
                                        .create(document.querySelector('#aboutus'))
                                        .then(editor => {
                                            console.log(editor);
                                        })
                                        .catch(error => {
                                            console.error(error);
                                        });
                                </script>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Perbarui Pengaturan</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- area konten utama selesai -->
@endsection
