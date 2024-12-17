@extends('layouts.frontbase')

@section('title', 'Konfirmasi Pesanan')
@section('description', optional($setting)->description)
@section('keywords', optional($setting)->keywords)
@section('icon', Storage::url(optional($setting)->icon))

@section('content')
<section class="breadcrumb-section set-bg" data-setbg="{{asset('assets')}}/img/colorcard.png">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Konfirmasi Pesanan</h2>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Bagian Breadcrumb Selesai -->

<!-- Bagian Kontak Mulai -->
<!-- Bagian Checkout Mulai -->
<section class="checkout spad">
    <div class="container">
        @include('home.messages')
    </div>
</section>
<!-- Bagian Checkout Selesai -->
@endsection
