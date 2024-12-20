@extends('layouts.adminbase')

@section('title', 'İz Market Products')

@section('content')
<div class="main-content-inner">
    <!-- row area start -->
    <div class="row">
        <div class="col-lg-12 col-ml-12">
            <div class="row">
                <!-- table form start -->
                <div class="col-lg-12 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title">Products</h4>
                            <div class="single-table">
                                <div class="table-responsive">
                                    <table class="table text-center">
                                        <thead class="text-uppercase bg-warning">
                                            <tr class="text-white">
                                                <th scope="col">ID</th>
                                                <th scope="col">Question</th>
                                                <th scope="col">Answer</th>
                                                <th scope="col">Edit</th>
                                                <th scope="col">Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($data as $rs)
                                            <tr>
                                                <th scope="row">{{$rs->id}}</th>
                                                <td>{{$rs->question}}</td>
                                                <td>{!! $rs->answer !!}</td>
                                                <td><a class="ti-write" href="{{route('admin.faq.edit',['id'=>$rs->id])}}"></a></td>
                                                <td><a class="ti-trash" href="{{route('admin.faq.destroy',['id'=>$rs->id])}}" , onclick="return confirm('Are you sure you want to delete?')"></a></td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <a class="btn btn-danger" href="{{ route('admin.faq.create')}}">Add New FAQ</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- table form end -->
            </div>
        </div>
    </div>
    <!-- row area end -->
    <div class="row mt-5">
    </div>
    <!-- row area start-->
</div>
</div>
<!-- main content area end -->
@endsection
