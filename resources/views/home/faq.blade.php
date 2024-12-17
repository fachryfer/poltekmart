@extends('layouts.frontbase')

@section('title', optional($setting)->title)
@section('description', optional($setting)->description)
@section('keywords', optional($setting)->keywords)
@section('icon', Storage::url(optional($setting)->icon))

@section('content')
<!-- Bagian Pahlawan Detail Blog Mulai -->
<section class="breadcrumb-section set-bg" data-setbg="{{asset('assets')}}/img/colorcard.png">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Pertanyaan Yang Sering Diajukan</h2>
                    <div class="breadcrumb__option">
                        <a href="{{route('home')}}">Beranda </a>
                        <a href="{{route('faq')}}">Pertanyaan Yang Sering Diajukan </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Bagian Pahlawan Detail Blog Selesai -->
<!-- FAQ mulai -->
<section class="blog-details spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-5 order-md-1 order-2">
                <div class="blog__sidebar">
                    <div class="blog__sidebar__item">
                        <h4>Terakhir Ditambahkan FAQ</h4>
                        <div class="blog__sidebar__recent">
                            @foreach($lastfaqs as $rs)
                            <a class="blog__sidebar__recent__item">
                                <div class="blog__sidebar__recent__item__text">
                                    <h6>{{$rs->question}}</h6>
                                    <span>{{$rs->created_at}}</span>
                                </div>
                            </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-7 order-md-1 order-1">
                <div class="blog__details__text">
                    <img src="{{asset('assets')}}/img/blog/faq.png" alt="">
                    @foreach($datalist as $rs)
                    <h3>{{$rs->question}}</h3>
                    <p>{!!$rs->answer!!}</p>
                    @endforeach
                </div>
                <div class="blog__details__content">
                    <div class="row">
                        
                        <div class="col-lg-6">
                            <div class="blog__details__widget">
                                <div class="blog__details__social">
                                @if($setting)
                                <a href="{{$setting->facebook}}"><i class="fa fa-facebook"></i></a>
                                <a href="{{$setting->instagram}}"><i class="fa fa-instagram"></i></a>
                                <a href="{{$setting->twitter}}"><i class="fa fa-github"></i></a>
                                @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Bagian Pahlawan Detail Blog Selesai -->
<!-- FAQ selesai -->

@endsection
