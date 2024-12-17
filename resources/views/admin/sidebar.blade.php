<!-- area menu sisi mulai -->
<div class="sidebar-menu">
    <div class="sidebar-header">
        <div class="logo">
            <a href="{{route('admin.index')}}"><img src="{{asset('assets')}}/admin/images/icon/flogopoltek.png" alt="logo"></a>
        </div>
    </div>
    <div class="main-menu">
        <div class="menu-inner">
            <nav>
                <ul class="metismenu" id="menu">
                    <li><a href="{{route('admin.index')}}"><i class="ti-home"></i> <span>Beranda</span></a></li>
                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-dashboard"></i><span>Pesanan</span></a>
                        <ul class="collapse">
                            <li><a href="{{ route('admin.order.index', ['slug' => 'baru']) }}">Pesanan Baru</a></li>
                            <li><a href="{{ route('admin.order.index', ['slug' => 'dikonfirmasi']) }}">Pesanan Dikonfirmasi</a></li>
                            <li><a href="{{ route('admin.order.index', ['slug' => 'selesai']) }}">Pesanan Selesai</a></li>
                            <li><a href="{{ route('admin.order.index', ['slug' => 'dibatalkan']) }}">Pesanan Dibatalkan</a></li>
                        </ul>
                    </li>
                    <li><a href="{{route('admin.category.index')}}"><i class="ti-layout-grid2"></i> <span>Kategori</span></a></li>
                    <li><a href="{{route('admin.product.index')}}"><i class="ti-package"></i> <span>Produk</span></a></li>
                    <li><a href="{{route('admin.message.index')}}"><i class="ti-email"></i> <span>Pesan</span></a></li>
                    <li><a href="{{route('admin.comment.index')}}"><i class="ti-comment"></i> <span>Komentar</span></a></li>
                    <li><a href="{{route('admin.faq.index')}}"><i class="ti-help"></i> <span>FAQ</span></a></li>
                    <li><a href="{{route('admin.setting')}}"><i class="ti-settings"></i> <span>Pengaturan</span></a></li>
                    <li><a href="{{route('admin.user.index')}}"><i class="ti-user"></i> <span>Pengguna</span></a></li>
                </ul>
            </nav>
        </div>
    </div>
</div>
<!-- area menu sisi selesai -->
