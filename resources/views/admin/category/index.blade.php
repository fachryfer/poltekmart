@extends('layouts.adminbase')

@section('title', 'Kategori Iz Market')

@section('content')
<div class="main-content-inner">
    <!-- area row start -->
    <div class="row">
        <div class="col-lg-12 col-ml-12">
            <div class="row">
                <!-- start table form -->
                <div class="col-lg-12 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title text-warning">Kategori</h4>
                            <!-- Tombol Tambahkan Kategori -->
                            <div class="mb-3 text-left">
                                <a class="btn btn-danger btn-sm" href="{{ route('admin.category.create') }}">
                                    <i class="ti-plus"></i> Tambahkan Kategori
                                </a>
                            </div>
                            <!-- Form Pencarian dan Filter -->
                            <form method="GET" action="{{ route('admin.category.index') }}" class="mb-4">
                                <div class="row align-items-center">
                                    <div class="col-md-4 mb-2">
                                        <input type="text" name="search" class="form-control form-control-sm" placeholder="Cari Kategori..." value="{{ request('search') }}">
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <select name="sort_by" class="form-control form-control-sm">
                                            <option value="">Urutkan Berdasarkan</option>
                                            <option value="newest" {{ request('sort_by') == 'newest' ? 'selected' : '' }}>Paling Baru</option>
                                            <option value="oldest" {{ request('sort_by') == 'oldest' ? 'selected' : '' }}>Paling Lama</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <button type="submit" class="btn btn-warning btn-sm">
                                            <i class="ti-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                            <div class="single-table">
                                <div class="table-responsive">
                                    <table class="table table-hover text-center text-nowrap">
                                        <thead class="bg-warning text-white">
                                            <tr>
                                                <th scope="col">No</th>
                                                <th scope="col">Parent Kategori</th>
                                                <th scope="col">Judul</th>
                                                <th scope="col">Kata Kunci</th>
                                                <th scope="col">Deskripsi</th>
                                                <th scope="col">Foto</th>
                                                <th scope="col">Edit</th>
                                                <th scope="col">Detail</th>
                                                <th scope="col">Hapus</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $no = ($data->currentPage() - 1) * $data->perPage() + 1; @endphp
                                            @foreach($data as $rs)
                                            <tr>
                                                <th scope="row">{{ $no++ }}</th>
                                                <td>{{ \App\Http\Controllers\AdminPanel\CategoryController::getParentsTree($rs, $rs->title) }}</td>
                                                <td>{{$rs->title}}</td>
                                                <td>{{$rs->keywords}}</td>
                                                <td>{{$rs->description}}</td>
                                                <td>
                                                    @if ($rs->image)
                                                    <img src="{{Storage::url($rs->image)}}" style="height:50px; width:50px; border-radius:2px">
                                                    @endif
                                                </td>
                                                <td><a class="btn btn-sm btn-warning" href="{{route('admin.category.edit',['id'=>$rs->id])}}"><i class="ti-write"></i></a></td>
                                                <td><a class="btn btn-sm btn-info" href="{{route('admin.category.show',['id'=>$rs->id])}}"><i class="ti-info-alt"></i></a></td>
                                                <td><a class="btn btn-sm btn-danger" href="{{route('admin.category.delete',['id'=>$rs->id])}}" onclick="return confirm('Yakin ingin menghapus?')"><i class="ti-trash"></i></a></td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <!-- Menampilkan link paginasi -->
                                    <div class="pagination justify-content-center mt-4">
                                        {{ $data->links('vendor.pagination.custom') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end table form -->
            </div>
        </div>
    </div>
    <!-- end area row -->
</div>
@endsection
