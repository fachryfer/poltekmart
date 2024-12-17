<!-- area konten utama start -->
<div class="main-content">
    <!-- area header start -->
    <div class="header-area">
        <div class="row align-items-center">
            <!-- tombol navigasi dan pencarian -->
            <div class="col-md-6 col-sm-8 clearfix">
                <div class="nav-btn pull-left">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
            <!-- info profil & notifikasi tugas -->
            <div class="col-md-6 col-sm-4 clearfix">
                <ul class="notification-area pull-right">
                    <li id="full-view"><i class="ti-fullscreen"></i></li>
                    <li id="full-view-exit"><i class="ti-zoom-out"></i></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- area header end -->
    <!-- area judul halaman start -->
    <div class="page-title-area">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="breadcrumbs-area clearfix">
                    <h4 class="page-title pull-left">Panel</h4>
                    <ul class="breadcrumbs pull-left">
                        <li><a href="{{route('admin.index')}}">Beranda</a></li>
                        <li><span>Panel</span></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-6 clearfix">
                <div class="user-profile pull-right">
                    @auth
                    <img class="avatar user-thumb" src="{{asset('assets')}}/admin/images/author/admin.png" alt="avatar">
                    <h4 class="user-name dropdown-toggle" data-toggle="dropdown">{{Auth::user()->name}} <i class="fa fa-angle-down"></i></h4>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{route('admin.message.index')}}">Pesan</a>
                        <a class="dropdown-item" href="{{route('admin.setting')}}">Pengaturan</a>
                        <a class="dropdown-item" href="{{route('admin_logout')}}">Keluar</a>
                    </div>
                    @endauth
                </div>
            </div>
        </div>
    </div>
    <style>
        .user-profiles {
            padding: 10px; 
            border-radius: 5px; 
            display: flex;
            justify-content: space-between; 
            align-items: center; 
        }
    
        .user-profile img {
            max-width: 40px; 
            border-radius: 50%;
        }
    </style>
    <!-- area judul halaman end -->
