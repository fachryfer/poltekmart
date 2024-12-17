@extends('layouts.frontbase')

@section('title', optional($setting)->title)
@section('description', optional($setting)->description)
@section('keywords', optional($setting)->keywords)
@section('icon', Storage::url(optional($setting)->icon))

@section('content')
<!-- Bagian Hero Detail Blog Dimulai -->
<section class="breadcrumb-section set-bg" data-setbg="{{asset('assets')}}/img/colorcard.png">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Tentang Kami</h2>
                    <div class="breadcrumb__option">
                        <a href="{{route('home')}}">Beranda</a>
                        <a href="{{route('about')}}">Tentang Kami</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Bagian Hero Detail Blog Selesai -->

<!-- Bagian Detail Blog Dimulai -->
<section class="blog-details spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-7 order-md-1 order-1">
                <div class="blog__details__text">
                    <img src="img/blog/details/details-pic.jpg" alt="">
                    @if($setting)
                    {!! $setting->aboutus !!}
                </div>
                <div class="blog__details__content">
                    <div class="row">
                        <div class="col-lg-6">
                            {!! $setting->references !!}
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bagian Filosofi Logo Dimulai -->
    <div class="container">
        <h2><b>FILOSOFI LOGO</b></h2>
            <br></br>
        <img src="{{asset('assets/img/poltekmartlogo.png')}}" alt="PoltekMart Logo" class="img-fluid mb-4" style="width: 500px; height: auto;">
        <p><strong>Warna Hitam pada Kata "Poltek"</strong></p>
        <p>Warna hitam melambangkan profesionalisme, kepercayaan, dan stabilitas. Ini menunjukkan bahwa PoltekMart adalah platform yang dapat diandalkan oleh pelanggan untuk memenuhi kebutuhan sehari-hari mereka dengan kualitas yang konsisten.</p>
        
        <p><strong>Warna Oranye pada Kata "Mart" dan Garis Melengkung di Bawahnya</strong></p>
        <p>Warna oranye mencerminkan semangat, antusiasme, dan inovasi. Ini menggambarkan PoltekMart sebagai platform yang dinamis dan berkomitmen untuk memberikan pengalaman belanja yang menyenangkan.</p>
        <p>Garis melengkung yang mulai dari kecil tajam hingga membesar melambangkan pertumbuhan dan perkembangan yang terus meningkat. Hal ini mencerminkan perjalanan PoltekMart dalam memberikan layanan yang semakin baik, efisien, dan relevan bagi pelanggan. Garis ini juga menunjukkan visi kami untuk terus maju dan berkembang bersama pelanggan, dari skala kecil hingga besar, dengan menyediakan solusi belanja yang lebih lengkap dan berkualitas.</p>
        
        <p><strong>Tipografi yang Tegas dan Bersih</strong></p>
        <p>Tipografi yang sederhana namun kuat mencerminkan bahwa PoltekMart mengutamakan kemudahan akses dan kenyamanan pelanggan tanpa mengurangi kesan modern dan profesional.</p>
        
        <p><strong>Makna Nama "PoltekMart"</strong></p>
        <p>Nama ini menggabungkan "Poltek," yang menunjukkan identitas atau komunitas yang mendukung platform ini, dengan "Mart," sebuah marketplace yang lengkap untuk makanan, jajanan, minuman, dan kebutuhan sehari-hari. Ini menegaskan peran PoltekMart sebagai pusat belanja yang terus bertumbuh dan berkomitmen untuk memenuhi kebutuhan masyarakat.</p>
    </div>
<!-- Bagian Filosofi Logo Selesai -->
</section>
<!-- Bagian Detail Blog Selesai -->

<!-- Bagian Card Profile Dimulai -->
<section class="profile-section spad">
    <div class="container">
        <h3 class="text-center"><b>Cowo Ganteng</b></h3>
        <br></br>
        <div class="row">
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card shadow-sm" style="height: 100%;">
                    <img src="{{asset('assets/img/orang4.png')}}" class="card-img-top" alt="Fachry Ferdiansyah Sembiring" style="height: 200px; object-fit: cover;">
                    <div class="card-body text-center">
                        <h5 class="card-title"><b>Fachry Ferdiansyah Sembiring</b></h5>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum architecto odio, ex tempora possimus atque ut, non voluptatum eius, labore amet est maiores doloremque repellat! Cum unde laborum distinctio dolor!</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card shadow-sm" style="height: 100%;">
                    <img src="{{asset('assets/img/orang4.png')}}" class="card-img-top" alt="Gilang Kurniawan" style="height: 200px; object-fit: cover;">
                    <div class="card-body text-center">
                        <h5 class="card-title"><b>Gilang Kurniawan</b></h5>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde, dolorum! Vel, necessitatibus. Facilis sed quibusdam illum, officiis exercitationem praesentium quo voluptates harum mollitia, numquam quas totam molestias maxime asperiores ratione!</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card shadow-sm" style="height: 100%;">
                    <img src="{{asset('assets/img/orang4.png')}}" class="card-img-top" alt="Wahyu Zendrato" style="height: 200px; object-fit: cover;">
                    <div class="card-body text-center">
                        <h5 class="card-title"><b>Wahyu Zendrato</b></h5>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos natus neque necessitatibus quidem error? Quisquam, soluta eligendi! Tenetur amet quaerat eaque neque quo earum quas mollitia sit, obcaecati quod et.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card shadow-sm" style="height: 100%;">
                    <img src="{{asset('assets/img/orang4.png')}}" class="card-img-top" alt="Adriel Ageva" style="height: 200px; object-fit: cover;">
                    <div class="card-body text-center">
                        <h5 class="card-title"><b>Adriel Ageva</b></h5>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis est reprehenderit fugit ea voluptatibus aut voluptas? Dolore vel unde nemo ea ut, debitis porro cupiditate in quam delectus cum maiores?</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Bagian Card Profile Selesai -->

@endsection
