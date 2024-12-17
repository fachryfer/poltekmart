@extends('layouts.adminbase')

@section('title', 'İz Market Ürünler')

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
                            <h4 class="header-title">Pesan</h4>
                            <div class="single-table">
                                <div class="table-responsive">
                                    <table class="table text-center">
                                        <thead class="text-uppercase bg-warning">
                                            <tr class="text-white">
                                                <th scope="col">No</th>
                                                <th scope="col">Nama</th>
                                                <th scope="col">Telepon</th>
                                                <th scope="col">Surel</th>
                                                <th scope="col">Subyek</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Tampilkan Detail</th>
                                                <th scope="col">Hapus</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $no = 1; @endphp
                                            @foreach($data as $rs)
                                            <tr>
                                                <th scope="row">{{ $no++ }}</th>
                                                <td>{{$rs->name}}</td>
                                                <td>{{$rs->email}}</td>
                                                <td>{{$rs->phone}}</td>
                                                <td>{{$rs->subject}}</td>
                                                <td>{{$rs->status}}</td>
                                                <td><a class="ti-info-alt" href="{{route('admin.message.show',['id'=>$rs->id])}}"></a></td>
                                                <td><a class="ti-trash" href="{{route('admin.message.destroy',['id'=>$rs->id])}}" onclick="return confirm('Apakah Anda yakin ingin menghapus?')"></a></td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
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
    <!-- Mulai area baris -->
</div>
</div>
<!-- Akhir area konten utama -->
@endsection
