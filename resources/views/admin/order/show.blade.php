@extends('layouts.adminbase')

@section('title', 'Detail Pesanan')

@section('content')
<div class="main-content-inner">
    <!-- Memulai area baris -->
    <div class="row">
        <div class="col-lg-12 col-ml-12">
            <div class="row">
                <!-- Memulai formulir tabel -->
                <div class="col-lg-12 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title">Detail Pesanan</h4>
                            <div class="single-table">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <tr>
                                            <th style="width: 30px">Id</th>
                                            <td>{{$data->id}}</td>
                                        </tr>
                                        <tr>
                                            <th style="width: 30px">Nama Lengkap</th>
                                            <td>{{$data->user->name}}</td>
                                        </tr>
                                        <tr>
                                            <th style="width: 30px">Telepon</th>
                                            <td>{{$data->phone}}</td>
                                        </tr>
                                        <tr>
                                            <th style="width: 30px">Alamat</th>
                                            <td>{{$data->address}}</td>
                                        </tr>
                                        <tr>
                                            <th style="width: 30px">Total</th>
                                            <td>Rp. {{ number_format($data->total, 2) }}</td>
                                        </tr>
                                        <tr>
                                            <th style="width: 30px">Tanggal Dibuat</th>
                                            <td>{{$data->created_at}}</td>
                                        </tr>
                                        <tr>
                                            <th style="width: 30px">Tanggal Terakhir Diperbarui</th>
                                            <td>{{$data->updated_at}}</td>
                                        </tr>
                                        <tr>
                                            <th style="width: 30px">Status:</th>
                                            <td>
                                                <form role="form" action="{{ route('admin.order.update', ['id' => $data->id]) }}" method="POST" class="forms-sample">
                                                    @csrf
                                                    <select name="status">
                                                        <option selected>{{$data->status}}</option>
                                                        <option>Baru</option>
                                                        <option>Dikonfirmasi</option>
                                                        <option>Selesai</option>
                                                        <option>Ditolak</option>
                                                    </select>
                                                    <br>
                                                    <select name="pembayaran">
                                                        <option value="Unpaid" {{ $data->pembayaran == 'Unpaid' ? 'selected' : '' }}>Unpaid</option>
                                                        <option value="Paid" {{ $data->pembayaran == 'Paid' ? 'selected' : '' }}>Paid</option>
                                                    </select>
                                                    <br>
                                                    <textarea name="note" cols="40" rows="2">{{$data->note}}
                                                    </textarea>
                                                    <div class="card-footer">
                                                        <button type="submit" class="btn-warning">Perbarui Status</button>
                                                    </div>
                                                </form>
                                            </td>
                                        </tr>
                                    </table>
                                    <table class="table text-center">
                                        <thead class="text-uppercase bg-warning">
                                            <tr class="text-white">
                                                <th scope="col">ID</th>
                                                <th scope="col">Produk</th>
                                                <th scope="col">Foto</th>
                                                <th scope="col">Biaya</th>
                                                <th scope="col">Jumlah Pesanan</th>
                                                <th scope="col">Total</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Pembayaran</th>
                                                <th scope="col">Setujui Produk</th>
                                                <th scope="col">Batalkan Produk</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($datalist as $rs)
                                            <tr>
                                                <th scope="row">{{$rs->product->id}}</th>
                                                <td>{{$rs->product->title}}</td>
                                                <td>
                                                    @if ($rs->product->image)
                                                    <img src="{{Storage::url($rs->product->image)}}" style="height:50px ;width:50px; border-radius:2px">
                                                    @endif
                                                </td>
                                                <td>Rp. {{$rs->product->price}}</td>
                                                <td>{{$rs->quantity}} unit</td>
                                                <td>Rp. {{$rs->amount}}</td>
                                                <td>{{$rs->status}}</td>
                                                <td>{{$rs->pembayaran}}</td>
                                                <td><a class="ti-check" href="{{route('admin.order.acceptproduct',['id'=>$rs->id])}}" , onclick="return confirm('Anda yakin ingin menyetujui produk ini?')"></a></td>
                                                <td><a class="ti-trash" href="{{route('admin.order.deleteproduct',['id'=>$rs->id])}}" , onclick="return confirm('Anda yakin ingin membatalkan produk ini?')"></a></td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    @php
                                    ($data->total =0)
                                    @endphp
                                    @foreach($datalist as $rs)
                                    @php
                                    ($data->total += $rs->quantity * $rs->price)
                                    @endphp
                                    @endforeach
                                    <div class="col-lg-6 col-ml-6">
                                        <div class="shoping__checkout">
                                            <h5>Total Keranjang</h5>
                                            <ul>
                                                <li>Total Tagihan <span>Rp. {{ number_format($data->total, 2) }}</span></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Akhir formulir tabel -->
            </div>
        </div>
    </div>
    <!-- Akhir area baris -->
    <div class="row mt-5">
    </div>
    <!-- Memulai area baris -->
</div>
</div>
<!-- Akhir area konten utama -->
@endsection
