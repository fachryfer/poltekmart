@extends('layouts.frontbase')

@section('title', 'Halaman Pesanan')
@section('description', optional($setting)->description)
@section('keywords', optional($setting)->keywords)
@section('icon', Storage::url(optional($setting)->icon))

@section('content')
<section class="breadcrumb-section set-bg" data-setbg="{{asset('assets')}}/img/colorcard.png">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Pembayaran</h2>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Bagian Selesai Breadcrumb -->

<!-- Bagian Kontak Mulai -->
<!-- Bagian Checkout Mulai -->
<section class="checkout spad">
    <div class="container">
        <div class="checkout__form">
            <h4>Detail Pesanan</h4>
            <form action="{{route('shopcart.storeorder')}}" method="post">
                @csrf
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Nama &amp; Nama Belakang<span>*</span></p>
                                    <input type="text" name="name" placeholder="Nama &amp; Nama Belakang" value="{{Auth::user()->name}}">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Nomor Telepon<span>*</span></p>
                                    <input type="tel" name="phone" placeholder="Nomor Telepon">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="checkout__input">
                                    <p>Alamat Email<span>*</span></p>
                                    <input type="email" name="email" placeholder="Alamat Email" value="{{Auth::user()->email}}">
                                </div>
                            </div>
                        </div>
                        <div class="checkout__input">
                            <p>Alamat<span>*</span></p>
                            <input type="text" name="address" placeholder="Alamat" class="checkout__input__add">
                        </div>
                        
                        <div class="checkout__input">
                            <input type="hidden" name="total" value="{{$total}}">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="checkout__order">
                            <h4>Pesanan Anda</h4>
                            <div class="checkout__order__products">Produk &amp; Jumlah<span>Harga</span></div>
                            <ul>
                                @foreach($datalist as $rs)
                                <li>{{ $rs->product->title }} x {{ $rs->quantity }}<span>Rp. {{ number_format($rs->product->price, 2) }}</span></li>
                                @endforeach
                            </ul>
                            <div class="checkout__order__subtotal">Subtotal <span>Rp.  {{ number_format($total, 2) }}</span></div>
                            <div class="checkout__order__total">Total Pesanan <span>Rp.  {{ number_format($total, 2) }}</span></div>                          
                            <button type="submit" class="site-btn">SELESAIKAN PESANAN</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<!-- Bagian Checkout Selesai -->

@if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif
@endsection

