@extends('layouts.adminbase')

@section('title', 'Pesanan Iz Market')

@section('content')
<div class="main-content-inner">
    <!-- area row start -->
    <div class="row">
        <div class="col-lg-12 col-ml-12">
            <div class="row">
                <!-- start table form -->
                <div class="col-lg-12 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title text-warning">Pesanan</h4>
                            <div class="single-table">
                                <div class="table-responsive">
                                    <table class="table table-hover text-center">
                                        <thead class="bg-warning text-white">
                                            <tr>
                                                <th scope="col">No</th>
                                                <th scope="col">Nama</th>
                                                <th scope="col">Telepon</th>
                                                <th scope="col">E-mail</th>
                                                <th scope="col">Alamat</th>
                                                <th scope="col">Catatan</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Pembayaran</th>
                                                <th scope="col">Detail</th>
                                                <th scope="col">Tolak</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $no = ($data->currentPage() - 1) * $data->perPage() + 1; @endphp
                                            @foreach($data as $rs)
                                            <tr>
                                                <th scope="row">{{ $no++ }}</th>
                                                <td><a href="{{route('admin.user.show',['id'=>$rs->user_id])}}">{{$rs->user->name}}</a></td>
                                                <td>{{$rs->phone}}</td>
                                                <td>{{$rs->email}}</td>
                                                <td>{{$rs->address}}</td>
                                                <td>{{$rs->note}}</td>
                                                <td>{{$rs->status}}</td>
                                                <td>{{$rs->pembayaran}}</td>
                                                <td><a class="btn btn-sm btn-info" href="{{route('admin.order.show',['id'=>$rs->id])}}"><i class="ti-info-alt"></i></a></td>
                                                <td><a class="btn btn-sm btn-danger" href="{{route('admin.order.reject',['id'=>$rs->id])}}" onclick="return confirm('Anda yakin ingin membatalkan pesanan ini?')"><i class="ti-close"></i></a></td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <!-- Menampilkan link paginasi -->
                                    <div class="pagination justify-content-center mt-4">
                                        {{ $data->links('vendor.pagination.custom') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end table form -->
            </div>
        </div>
    </div>
    <!-- end area row -->
</div>
@endsection
