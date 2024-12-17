@extends('layouts.frontbase')

@section('title', 'Histori Pesanan Saya')
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
                <h4 class="text-center">Histori Pesanan Saya</h4> <br>
                <div class="row">
                    @php $no = 1; @endphp
                    @foreach($data as $rs)
                    <div class="col-lg-6 col-md-6 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Pesanan No: {{$no++}}</h5>
                                <p class="card-text"><strong>Nama:</strong> {{$rs->name}}</p>
                                <p class="card-text"><strong>Telepon:</strong> {{$rs->phone}}</p>
                                <p class="card-text"><strong>Email:</strong> {{$rs->email}}</p>
                                <p class="card-text"><strong>Alamat:</strong> {{$rs->address}}</p>
                                <p class="card-text"><strong>Status:</strong> {{$rs->status}}</p>
                                <a href="{{route('userpanel.orderdetail',['id'=>$rs->id])}}" class="btn btn-warning btn-sm">Lihat Rincian</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Bagian Blog Selesai -->
@endsection
