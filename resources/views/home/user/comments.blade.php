@extends('layouts.frontbase')

@section('title', 'Ulasan dan Tinjauan Saya')
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
                <h4 class="text-center">Ulasan dan Tinjauan Saya</h4> <br>
                <div class="row">
                    @foreach($comments as $rs)
                    <div class="col-lg-12 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Produk: <a href="{{route('product',['id'=>$rs->product_id])}}">{{$rs->product->title}}</a></h5>
                                <p class="card-text"><strong>Judul:</strong> {{$rs->subject}}</p>
                                <p class="card-text"><strong>Ulasan:</strong> {{$rs->comment}}</p>
                                <p class="card-text"><strong>Penilaian:</strong> {{$rs->rate}}/5</p>
                                <p class="card-text"><strong>Status:</strong> {{$rs->status}}</p>
                                <a href="{{route('userpanel.reviewdestroy',['id'=>$rs->id])}}" class="btn btn-danger btn-sm" onclick="return confirm('Dihapus, Apakah Anda yakin ?')">Hapus</a>
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
