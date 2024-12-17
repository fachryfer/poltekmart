<!-- Preloader -->
<div id="preloder">
    <div class="loader"></div>
</div>

<!-- Humberger Begin -->
<div class="humberger__menu__overlay"></div>
<div class="humberger__menu__wrapper">
    <div class="humberger__menu__logo">
        <a href="#"><img src="{{asset('assets')}}/img/poltekmartlogo.png" alt=""></a>
    </div>
    <div class="humberger__menu__cart">
        @auth
        <div class="col-lg-3">
            <div class="header__cart">
                <ul>
                    <li><a href="{{route('userpanel.favoriteproduct')}}"><i class="fa fa-heart"></i> <span>{{$favproducts->count()}}</span></a></li>
                    <li><a href="{{route('shopcart.index')}}"><i class="fa fa-shopping-bag"></i> <span></span></a></li>
                </ul>
                @php
                ($total =0)
                @endphp
                @foreach($shopcarttotal as $rs)
                @php
                ($total += $rs->product->price * $rs->quantity)
                @endphp
                @endforeach
                <div class="header__cart__price">Total Keranjang: <span>Rp. {{ number_format($total, 2) }}</span></div>
            </div>
        </div>
        @endauth
    </div>
    <div class="humberger__menu__widget">
        <div class="header__top__right__auth">
            <a href="loginuser"><i class="fa fa-user"></i> Masuk Anggota</a>
        </div>
    </div>
    <nav class="humberger__menu__nav mobile-menu">
        <ul>
            <li><a href="{{route('home')}}">BERANDA</a></li>
            <li><a href="{{route('categoryproducts', ['id' => 1])}}">BELANJA</a></li>
            <li><a href="{{route('contact')}}">HUBUNGI KAMI</a></li>
            <li><a href="{{route('about')}}">TENTANG KAMI</a></li>
            <li><a href="{{route('faq')}}">PERTANYAAN UMUM</a></li>
            <li><a href="{{route('userpanel.index')}}">AKUN SAYA</a>
                <ul class="header__menu__dropdown">
                    <li> @guest
                        <a href="/loginuser">Masuk Anggota</a>
                    </li>
                    <li>
                        <a href="/registeruser">Daftar Anggota</a>
                        @endguest
                    </li>
                    <li> @auth
                        <a href="{{route('userpanel.index')}}">{{Auth::user()->name}}</a>
                        @endauth
                    </li>
                    <li> @auth
                        <a href="/logoutuser">Keluar</a>
                        @endauth
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="mobile-menu-wrap"></div>
    <div class="header__top__right__social">
        @if($setting)
        <a href="{{$setting->facebook}}"><i class="fa fa-facebook"></i></a>
        <a href="{{$setting->instagram}}"><i class="fa fa-instagram"></i></a>
        <a href="{{$setting->twitter}}"><i class="fa fa-github"></i></a>
        <a href="{{$setting->youtube}}"><i class="fa fa-youtube"></i></a>
        @endif
    </div>
</div>
<!-- Humberger End -->

<!-- Header Section Begin -->
<header class="header">
    <div class="header__top">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="header__top__left">
                        
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="header__top__right">
                        <div class="header__top__right__social">
                            @if($setting)
                            <a href="{{$setting->facebook}}"><i class="fa fa-facebook"></i></a>
                            <a href="{{$setting->instagram}}"><i class="fa fa-instagram"></i></a>
                            <a href="{{$setting->twitter}}"><i class="fa fa-github"></i></a>
                            <a href="{{$setting->youtube}}"><i class="fa fa-youtube"></i></a>
                            @endif
                        </div>
                        <div class="header__top__right__auth">
                            <a href="/loginuser"><i class="fa fa-user"></i> Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="header__logo">
                    <a href="{{route('home')}}"><img src="{{asset('assets')}}/img/poltekmartlogo.png" alt=""></a>
                </div>
            </div>
            <div class="col-lg-6">
                <nav class="header__menu">
                    <ul>
                        <li><a href="{{route('home')}}">BERANDA</a></li>
                        <li><a href="{{route('categoryproducts', ['id' => 1])}}">BELANJA</a></li>
                        <li><a href="{{route('contact')}}">HUBUNGI KAMI</a></li>
                        <li><a href="{{route('about')}}">TENTANG KAMI</a></li>
                        <li><a href="{{route('faq')}}">PERTANYAAN UMUM</a></li>
                        <li><a href="{{route('userpanel.index')}}">AKUN SAYA</a>
                            <ul class="header__menu__dropdown">
                                <li> @guest
                                    <a href="/loginuser">Masuk Anggota</a>
                                </li>
                                <li>
                                    <a href="/registeruser">Daftar Anggota</a>
                                    @endguest
                                </li>
                                <li> @auth
                                    <a href="{{route('userpanel.index')}}">{{Auth::user()->name}}</a>
                                    @endauth
                                </li>
                                <li> @auth
                                    <a href="/logoutuser">Keluar</a>
                                    @endauth
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
            @auth
            <div class="col-lg-3">
                <div class="header__cart">
                    <ul>
                        <li><a href="{{route('userpanel.favoriteproduct')}}"><i class="fa fa-heart"></i> <span>{{$favproducts->count()}}</span></a></li>
                        <li><a href="{{route('shopcart.index')}}"><i class="fa fa-shopping-bag"></i></a></li>
                    </ul>
                    @php
                    ($total =0)
                    @endphp
                    @foreach($shopcarttotal as $rs)
                    @php
                    ($total += $rs->product->price * $rs->quantity)
                    @endphp
                    @endforeach
                    <div class="header__cart__price">Total Keranjang: <span>Rp. {{ number_format($total, 2) }}</span></div>
                </div>
            </div>
            @endauth
        </div>
        <div class="humberger__open">
            <i class="fa fa-bars"></i>
        </div>
    </div>
</header>
<!-- Header Section End -->
