@extends('layouts.frontbase')

@section('title', 'Keranjang Belanja Panel Pengguna')
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

<!-- Bagian Keranjang Belanja Mulai -->
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
                            <h4 style="text-align: center;">Keranjang Belanja Saya</h4>
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
                                    <th>Jumlah</th>
                                    <th>Total Harga</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @include('home.messages')
                                @php
                                ($total=0)
                                @endphp
                                @foreach($data as $rs)
                                <tr>
                                    <td class="shoping__cart__item">
                                        <img style="height: 50px;width:50px" src="{{ Storage::url($rs->product->image)}}" alt="">
                                        <h5><a style="color: black;" href="{{route('product',['id'=>$rs->product_id])}}">{{$rs->product->title}}</a></h5>
                                    </td>
                                    <td class="shoping__cart__price">
                                        Rp. {{ number_format($rs->product->price, 2) }}
                                    </td>
                                    <form action="{{route('shopcart.update',['id'=>$rs->id])}}" method="post">
                                        @csrf
                                        <td class="shoping__cart__quantity">
                                            <div class="quantity">
                                                <div class="pro-qty">
                                                    <input type="number" name="quantity" value="{{$rs->quantity}}" min="1" max="{{$rs->product->quantity}}" onchange="this.form.submit()">
                                                </div>
                                            </div>
                                    </form>
                                    </td>
                                    <td class="shoping__cart__total">
                                    Rp. {{ number_format($rs->product->price * $rs->quantity, 2)}}
                                    </td>
                                    <td class="shoping__cart__item__close">
                                        <a style="color: black;" class="icon_close" href="{{route('shopcart.destroy',['id'=>$rs->id])}}" , onclick="return confirm('Apakah Anda yakin ingin menghapus?')"></a>
                                    </td>
                                </tr>
                                @php
                                ($total += $rs->product->price * $rs->quantity)
                                @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="shoping__cart__btns">
                                <a href="{{route('home')}}" class="primary-btn cart-btn">Lanjutkan Belanja</a>
                                <!-- <a href="#" class="primary-btn cart-btn cart-btn-right"><span class="icon_loading"></span>
                        Perbarui Keranjang</a> -->
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="shoping__checkout">
                                <h5>Total Keranjang</h5>
                                <ul>
                                    <li>Total Harga <span>Rp. {{ number_format($total, 2) }}</span></li>
                                </ul>
                                <form action="{{route('shopcart.order')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="total" value="{{$total}}">
                                    <button class="primary-btn" type="submit">Lanjut ke Pembayaran</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Bagian Keranjang Belanja Selesai -->
@endsection
