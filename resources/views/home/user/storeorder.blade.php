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

<!-- Bagian Checkout Mulai -->
<section class="checkout spad">
    <div class="container">
        <div class="checkout__form">
            <h4>Detail Pesanan</h4>
            <form action="{{route('shopcart.storeorder')}}" method="post">
                @csrf
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="checkout__order">
                            <h4>Pesanan Anda</h4>
                            <div class="checkout__order__detail"><div class="checkout__order__products">Data Customer <span>Harga</span></div>
                                <p>{{ Auth::user()->name }}</p>
                                <p>{{ Auth::user()->email }}</p>
                                <p>{{ session('order_data.phone', '') }}</p>
                                <p>{{ session('order_data.address', '') }}</p>
                            </div>
                            <hr>
                            <div class="checkout__order__products">Produk &amp; Jumlah</div>
                            <ul>
                                @foreach($datalist as $rs)
                                <li>{{ $rs->product->title }} x {{ $rs->quantity }}<span>Rp. {{ number_format($rs->product->price, 2) }}</span></li>
                                @endforeach
                            </ul>
                            <div class="checkout__order__subtotal">Subtotal <span>Rp.  {{ number_format($total, 2) }}</span></div>
                            <div class="checkout__order__total">Total Pesanan <span>Rp.  {{ number_format($total, 2) }}</span></div>
                            <button type="submit" class="site-btn" id="pay-button">KONFIRMASI &amp; BAYAR PESANAN</button>
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

@isset($snapToken)
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('services.midtrans.client_key') }}"></script>
    <script>
    document.getElementById('pay-button').onclick = function(event){
        event.preventDefault(); // Mencegah form dari submit secara default
        console.log('Snap Token:', '{{ $snapToken }}');
        snap.pay('{{ $snapToken }}', {
            onSuccess: function(result){
                console.log('Payment success', result);
                // Anda bisa submit form secara manual di sini jika diperlukan
            },
            onPending: function(result){
                console.log('Payment pending', result);
            },
            onError: function(result){
                console.log('Payment error', result);
            }
        });
    };
    </script>
@endisset
@endsection

