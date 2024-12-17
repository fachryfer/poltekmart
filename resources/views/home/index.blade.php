@extends('layouts.frontbase')

@section('title', optional($setting)->title)
@section('description', optional($setting)->description)
@section('keywords', optional($setting)->keywords)
@section('icon', Storage::url(optional($setting)->icon))

@section('content')
<!-- Bagian Hero Dimulai -->
<section class="hero">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="hero__categories category__menu">
                    @php
                    $mainCategories = \App\Http\Controllers\HomeController::maincategorylist();
                    @endphp
                    <div class="hero__categories__all">
                        <i class="fa fa-bars"></i>
                        <span>Kategori</span>
                    </div>
                    <ul>
                        @foreach($mainCategories as $rs)
                        <li class=""><a href="{{route('categoryproducts',['id'=>$rs->id])}}">{{$rs->title}}</a>
                            @if(count($rs->children))
                            @include('home.categorytree',['children' => $rs->children])
                            @endif
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="hero__search">
                    <div class="hero__search__form">
                        <form action="{{route('getproduct')}}" method="POST">
                            @csrf
                            @livewire('search')
                            <button type="submit" class="site-btn">CARI</button>
                        </form>
                        @livewireScripts
                    </div>
                    <div class="hero__search__phone">
                        
                    </div>
                </div>
                <div class="hero__item set-bg" data-setbg="{{asset('assets')}}/img/hero/banner2.jpg">
                    <div class="hero__text">
                        <span>Belanja Hemat</span>
                        <h2>Produk Terbaik <br />dengan Harga Terjangkau</h2>
                        <a href="productcategory/1" class="primary-btn">Belanja</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Bagian Hero Selesai -->

<!-- Bagian Kategori Dimulai -->
<section class="categories">
    <div class="container">
        <div class="row">
            <div class="categories__slider owl-carousel">
                @foreach($sliderdata as $rs)
                <div class="col-lg-3">
                    <div class="categories__item set-bg" data-setbg="{{ Storage::url("{$rs->image}") }}">
                        <h5 style="background-color: white;"><a href="{{route('categoryproducts',['id'=>$rs->id])}}">{{$rs->title}}</a></h5>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<!-- Bagian Kategori Selesai -->

<!-- Bagian Produk Unggulan Dimulai -->
<section class="featured spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Produk Relevan</h2>
                </div>
            </div>
        </div>
        @include('home.messages')
        <div class="row featured__filter">
            @foreach($servicelist1 as $rs)
            <div class="col-lg-2 col-md-4 col-sm-6 mix oranges fresh-meat">
                <div class="featured__item">
                    <div class="featured__item__pic set-bg" data-setbg="{{ Storage::url("{$rs->image}") }}">
                        <ul class="featured__item__pic__hover">
                            <li><a href="{{route('storefavorite',['id'=>$rs->id])}}"><i class="fa fa-heart"></i></a></li>
                            <li><a href="{{route('shopcart.add',['id'=>$rs->id])}}"><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>
                    </div>
                    <div class="featured__item__text">
                        <h6><a href="{{route('product',['id'=>$rs->id])}}">{{$rs->title}}</a></h6>
                        <h5>Rp. {{ number_format($rs->price, 2) }}</h5>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- Bagian Produk Unggulan Selesai -->

<!-- Bagian Banner Dimulai -->
<div class="banner">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="banner__pic">
                    <img src="{{asset('assets')}}/img/banner/bannerwin.jpg" alt="">
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="banner__pic">
                    <img src="{{asset('assets')}}/img/banner/bannerwin2.jpg" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Bagian Banner Selesai -->

<!-- Bagian Produk Terbaru Dimulai -->
<section class="latest-product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="latest-product__text">
                    <h4>Produk Terbaru</h4>
                    <div class="latest-product__slider owl-carousel">
                        @foreach($lastproducts as $rs)
                        <div class="latest-prdouct__slider__item">
                            <a href="{{route('product',['id'=>$rs->id])}}" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="{{ Storage::url("{$rs->image}") }}" />
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>{{$rs->title}}</h6>
                                    <span>Rp. {{ number_format($rs->price, 2) }}</span>
                                </div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="latest-product__text">
                    <h4>Produk Terlaris</h4>
                    <div class="latest-product__slider owl-carousel">
                        @foreach($mostsellerproducts as $rs)
                        <div class="latest-prdouct__slider__item">
                            <a href="{{route('product',['id'=>$rs->product->id])}}" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="{{Storage::url($rs->product->image)}}" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>{{$rs->product->title}}</h6>
                                    <span>Rp. {{ number_format($rs->product->price, 2) }}</span>
                                </div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="latest-product__text">
                    <h4>Produk Dengan Penilaian Tertinggi</h4>
                    <div class="latest-product__slider owl-carousel">
                        @foreach($mosthasreviewproducts as $rs)
                            @if ($rs->product)
                                <div class="latest-prdouct__slider__item">
                                    <a href="{{ route('product', ['id' => $rs->product->id]) }}" class="latest-product__item">
                                        <div class="latest-product__item__pic">
                                            <img src="{{ Storage::url($rs->product->image) }}" alt="">
                                        </div>
                                        <div class="latest-product__item__text">
                                            <h6>{{ $rs->product->title }}</h6>
                                            <span>Rp. {{ number_format($rs->product->price, 2) }}</span>
                                        </div>
                                    </a>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>            
        </div>
    </div>
</section>
<!-- Bagian Produk Terbaru Selesai -->

<!-- Bagian Blog Dimulai -->
<section class="from-blog spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title from-blog__title">
                    <h2>Pertanyaan yang Sering Diajukan</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($lastfaqs as $rs)
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="blog__item">
                    <div class="blog__item__text">
                        <ul>
                            <li><i class="fa fa-calendar-o"></i> {{$rs->created_at->format('m/d/Y')}}</li>
                        </ul>
                        <h5>{{$rs->question}}</h5>
                        <p>{!!$rs->answer!!}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- Bagian Blog Selesai -->
@endsection
