@extends('layouts.frontbase')

@section('title', 'Panel Pengguna Favorit')
@section('description', optional($setting)->description)
@section('keywords', optional($setting)->keywords)
@section('icon', Storage::url(optional($setting)->icon))

@section('content')
<!-- Bagian Mulai Breadcrumb -->
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
<!-- Bagian Selesai Breadcrumb -->

<!-- Bagian Mulai Shoping Cart -->
<section class="shoping-cart spad">
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
            <div class="col-lg-9 col-md-7">
                <div class="container">
                    <div class="row">
                        <div class="contact__widget">
                            <h4 style="text-align: center;">Produk Favorit Saya</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="shoping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th class="shoping__product">Produk</th>
                                    <th>Harga</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @include('home.messages')
                                @foreach($favproducts as $rs)
                                <tr>
                                    <td class="shoping__cart__item">
                                        <img style="height: 50px;width:50px" src="{{ Storage::url($rs->product->image)}}" alt="">
                                        <h5><a style="color: black;" href="{{route('product',['id'=>$rs->product_id])}}">{{$rs->product->title}}</a></h5>
                                    </td>
                                    <td class="shoping__cart__price">
                                        Rp. {{ number_format($rs->product->price, 2) }}
                                    </td>
                                    <td class="shoping__cart__item__close">
                                        <a style="color: black;" class="icon_close" href="{{route('destroyfavorite',['id'=>$rs->id])}}" , onclick="return confirm('Yakin ingin menghapus dari favorit?')"></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Bagian Selesai Shoping Cart -->
@endsection
