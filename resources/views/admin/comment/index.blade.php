@extends('layouts.adminbase')

@section('title', 'POLTEKMART | ADMIN PANEL')

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
                            <h4 class="header-title">Komentar</h4>
                            <div class="single-table">
                                <div class="table-responsive">
                                    <table class="table text-center">
                                        <thead class="text-uppercase bg-warning">
                                            <tr class="text-white">
                                                <th scope="col">No</th>
                                                <th scope="col">Produk</th>
                                                <th scope="col">Nama</th>
                                                <th scope="col">Topik</th>
                                                <th scope="col">Peringkat</th>
                                                <th scope="col">Tampilkan Detail</th>
                                                <th scope="col">Hapus</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $no = 1; @endphp
                                            @foreach($data as $rs)
                                            <tr>
                                                <th scope="row">{{ $no++ }}</th>
                                                <td>{{$rs->product->title}}</td>
                                                <td>{{$rs->user->name}}</td>
                                                <td>{{$rs->subject}}</td>
                                                <td>{{$rs->rate}}</td>
                                                <td><a class="ti-info-alt" href="{{route('admin.comment.show',['id'=>$rs->id])}}"></a></td>
                                                <td><a class="ti-trash" href="{{route('admin.comment.destroy',['id'=>$rs->id])}}" onclick="return confirm('Yakin ingin menghapus?')"></a></td>
                                            </tr>
                                            @endforeach
                                        </tbody>
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
