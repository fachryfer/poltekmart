@extends('layouts.frontbase')

@section('title', optional($setting)->title)
@section('description', optional($setting)->description)
@section('keywords', optional($setting)->keywords)
@section('icon', Storage::url(optional($setting)->icon))

@section('content')
<section class="breadcrumb-section set-bg" data-setbg="{{asset('assets')}}/img/colorcard.png">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Hubungi Kami</h2>
                    <div class="breadcrumb__option">
                        <a href="{{route('home')}}">Beranda </a>
                        <a href="{{route('contact')}}">Hubungi Kami </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Bagian Breadcrumb Selesai -->

<!-- Bagian Hubungi Kami Mulai -->
<section class="contact spad">
    <div class="container">
        <div class="row">
            @if($setting)
            <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                <div class="contact__widget">
                    <span class="icon_phone"></span>
                    <h4>Telepon</h4>
                    <p>{{$setting->phone}}</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                <div class="contact__widget">
                    <span class="icon_pin_alt"></span>
                    <h4>Alamat Kantor</h4>
                    <p>{{$setting->adress}}</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                <div class="contact__widget">
                    <span class="icon_clock_alt"></span>
                    <h4>Jam Kerja</h4>
                    <p>{{$setting->opentime}}</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                <div class="contact__widget">
                    <span class="icon_mail_alt"></span>
                    <h4>Alamat Email</h4>
                    <p>{{$setting->email}}</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Bagian Hubungi Kami Selesai -->

<!-- Peta Mulai -->
<div class="map">
    <iframe width="600" height="500" id="gmap_canvas" src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3982.3340411274457!2d98.61412007497282!3d3.5099745964643616!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zM8KwMzAnMzUuOSJOIDk4wrAzNycwMC4xIkU!5e0!3m2!1sid!2sid!4v1702216809999!5m2!1sid!2sid" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
    <div class="map-inside">
        <i class="icon_pin"></i>
        <div class="inside-widget">
            <h4>{{$setting->company}}</h4>
            <ul>
                <li>Telepon: {{$setting->phone}}</li>
                <li>{{$setting->adress}}</li>
            </ul>
        </div>
        @endif
    </div>
</div>
<!-- Peta Selesai -->

<!-- Formulir Hubungi Kami Mulai -->
<div class="contact-form spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="contact__form__title">
                    <h2>Kirim Pesan</h2>
                </div>
            </div>
        </div>
        @include('home.messages')
        <form action="{{route('storemessage')}}" id="review_form" class="review_form" method="POST">
            @csrf
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <input name="name" type="text" placeholder="Nama Anda">
                </div>
                <div class="col-lg-6 col-md-6">
                    <input name="phone" type="text" placeholder="Telepon Anda">
                </div>
                <div class="col-lg-6 col-md-6">
                    <input name="email" type="text" placeholder="Alamat Email Anda">
                </div>
                <div class="col-lg-6 col-md-6">
                    <input name="subject" type="text" placeholder="Subjek">
                </div>
                <div class="col-lg-12 text-center">
                    <textarea name="message" placeholder="Pesan Anda"></textarea>
                    <button type="submit" class="site-btn">KIRIM PESAN</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- Formulir Hubungi Kami Selesai -->
@endsection
