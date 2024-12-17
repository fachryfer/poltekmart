    <!-- Footer Section Begin -->
    <footer class="footer spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__about__logo">
                            <a href="./index.html"><img src="{{asset('assets')}}/img/poltekmartlogo.png" alt=""></a>
                        </div>
                        <ul>
                            @if($setting)
                                <li>Alamat: {{$setting->adress}}</li>
                                <li>Telepon: {{$setting->phone}}</li>
                                <li>Email: {{$setting->email}}</li>
                            @endif
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
                    <div class="footer__widget">
                        <h6>Halaman Kami</h6>
                        <ul>
                            <li><a href="{{route('home')}}">Beranda</a></li>
                            <li><a href="{{route('about')}}">Tentang Kami</a></li>
                            <li><a href="{{route('contact')}}">Hubungi Kami</a></li>
                            <li><a href="{{route('faq')}}">FAQ</a></li>
                        </ul>
                        <ul>
                            <li><a href="/loginuser">Masuk Anggota</a></li>
                            <li><a href="/registeruser">Daftar Anggota</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="footer__widget">
                        <h6>Daftar Anggota Sekarang</h6>
                        <a class="site-btn" href="/registeruser">Daftar Anggota</a>
                        <hr class="footer__copyright">
                        <div class="footer__widget__social">
                            @if($setting)
                                <a href="{{$setting->facebook}}"><i class="fa fa-facebook"></i></a>
                                <a href="{{$setting->instagram}}"><i class="fa fa-instagram"></i></a>
                                <a href="{{$setting->twitter}}"><i class="fa fa-github"></i></a>
                                <a href="{{$setting->youtube}}"><i class="fa fa-youtube"></i></a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer__copyright">
                        <div class="footer__copyright__text">
                            <p>
                                ©<script>
                                    document.write(new Date().getFullYear());
                                </script> PoltekMart | All Rights Reserved.
                            </p>
                        </div>
                        <div class="footer__copyright__payment"><img src="img/payment-item.png" alt=""></div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="{{asset('assets')}}/js/jquery-3.3.1.min.js"></script>
    <script src="{{asset('assets')}}/js/bootstrap.min.js"></script>
    <script src="{{asset('assets')}}/js/jquery.nice-select.min.js"></script>
    <script src="{{asset('assets')}}/js/jquery-ui.min.js"></script>
    <script src="{{asset('assets')}}/js/jquery.slicknav.js"></script>
    <script src="{{asset('assets')}}/js/mixitup.min.js"></script>
    <script src="{{asset('assets')}}/js/owl.carousel.min.js"></script>
    <script src="{{asset('assets')}}/js/main.js"></script>
