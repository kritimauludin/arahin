@extends('templates.adminLayout')

@section('title', '[Blog Post - Category]')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    @if(session()->has('success'))
    <div class="alert alert-success" role="alert">
        {{session('success')}}
    </div>
    @endif
    <!-- Tabel -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-dark d-inline">Category Active</h6>
            <a href="/mycategory/categories/create" class="float-right"><i class="fas fa-fw fa-plus"></i></a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Category</th>
                            <th>Category For</th>
                            <th>Submitted Since</th>
                            <th>Active Since</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Category</th>
                            <th>Category For</th>
                            <th>Submitted Since</th>
                            <th>Active Since</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($categories as $category)
                        <tr>
                            <th>{{$loop->iteration}}</th>
                            <th>{{$category->name}}</th>
                            <th>{{$category->category_for}}</th>
                            <th>{{\Carbon\Carbon::parse($category->created_at)->format('d M Y')}}</th>
                            <th>{{\Carbon\Carbon::parse($category->updated_at)->format('d M Y')}}</th>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection