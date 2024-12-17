@extends('layouts.frontbase')

@section('title', 'Panel Pengguna')
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
<!-- Bagian Mulai Blog -->
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
                <table class="table">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Terakhir</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">Alamat Email</th>
                            <td>{{Auth::user()->email}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Nama</th>
                            <td>{{Auth::user()->name}}</td>
                        </tr>
                    </tbody>
                </table>
                <a class="btn btn-warning" href="/user/profile">Perbarui Informasi Saya</a>
            </div>
        </div>
    </div>
</section>
<!-- Bagian Selesai Blog -->
@endsection
