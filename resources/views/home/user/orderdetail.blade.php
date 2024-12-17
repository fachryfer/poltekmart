@extends('layouts.frontbase')

@section('title', 'Detail Pesanan Terdahulu')
@section('description', optional($setting)->description)
@section('keywords', optional($setting)->keywords)
@section('icon', Storage::url(optional($setting)->icon))

@section('content')
<!-- Bagian Breadcrumb Mulai -->
<section class="breadcrumb-section set-bg" data-setbg="{{asset('assets')}}/img/colorcard.png">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Akun Saya</h2>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Bagian Breadcrumb Selesai -->
<!-- Bagian Blog Mulai -->
<section class="blog spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-5">
                <div class="blog__sidebar">
                    <div class="blog__sidebar__item">
                        <h4>Aktivitas Saya</h4>
                        <ul>
                            @include('home.user.usermenu')
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-9">
                <h4 class="text-center">Detail Pesanan</h4> <br>
                <div class="card mb-4">
                    <div class="card-header bg-warning text-white">
                        Informasi Pesanan
                    </div>
                    <div class="card-body">
                        <p><strong>ID Pesanan:</strong> {{$order->id}}</p>
                        <p><strong>Nama:</strong> {{$order->name}}</p>
                        <p><strong>Telepon:</strong> {{$order->phone}}</p>
                        <p><strong>Alamat:</strong> {{$order->address}}</p>
                        <p><strong>Catatan:</strong> {{$order->note}}</p>
                        <p><strong>Status:</strong> {{$order->status}}</p>
                        <p><strong>Pembayaran:</strong> {{$order->pembayaran}}</p>
                        <p><strong>Tanggal Pembuatan Pesanan:</strong> {{$order->created_at}}</p>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header bg-warning text-white">
                        Produk dalam Pesanan
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table text-center">
                                <thead class="text-uppercase bg-warning">
                                    <tr class="text-white">
                                        <th scope="col">No</th>
                                        <th scope="col">Produk</th>
                                        <th scope="col">Foto</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Harga</th>
                                        <th scope="col">Jumlah Pesanan</th>
                                        <th scope="col">Total</th>
                                        <th scope="col">Batalkan Produk</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no = 1; @endphp
                                    @foreach($orderproducts as $rs)
                                    <tr>
                                        <th scope="row">{{$no++}}</th>
                                        <td>{{$rs->product->title}}</td>
                                        <td>
                                            @if ($rs->product->image)
                                            <img src="{{Storage::url($rs->product->image)}}" style="height:50px; width:50px; border-radius:2px">
                                            @endif
                                        </td>
                                        <td>{{$rs->status}}</td>
                                        <td>Rp. {{ number_format($rs->product->price, 2) }}</td>
                                        <td>{{$rs->quantity}} unit</td>
                                        <td>Rp. {{ number_format($rs->amount, 2) }}</td>
                                        <td><a style="color: black;" class="icon_close" href="{{route('userpanel.deleteproduct',['id'=>$rs->id])}}" onclick="return confirm('Yakin ingin membatalkan?')"><i class="fas fa-times"></i></a></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="shoping__checkout mt-4">
                            <h5>Total Pesanan</h5>
                            <ul>
                                <li>Total Harga <span>Rp. {{ number_format($order->total, 2) }}</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Bagian Blog Selesai -->
@endsection
