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
                    <h2>MASUK ANGGOTA</h2>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Blog Details Hero End -->

<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-7 order-md-1 order-1">
            @include('auth.login')
        </div>
    </div>
</div>
@endsection
