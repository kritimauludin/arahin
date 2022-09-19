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
            <h6 class="m-0 font-weight-bold text-dark d-inline">Category Suggestions</h6>
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
                            <th>Submitted since</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Category</th>
                            <th>Category For</th>
                            <th>Submitted since</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($categories as $category)
                        <tr>
                            <th>{{$loop->iteration}}</th>
                            <th>{{$category->name}}</th>
                            <th>{{$category->category_for}}</th>
                            <th>{{Carbon\Carbon::parse($category->created_at)->diffForHumans()}}</th>
                            <th>
                                <a href="/mycategory/categories/{{$category->slug}}/edit" class=""><i class="fas fa-fw fa-edit text-warning"></i></a>
                                <form action="/mycategory/categories/{{$category->slug}}" method="POST" class="d-inline">
                                    @method('DELETE')
                                    @csrf
                                    <button class="border-0 bg-transparant" style="background-color: transparent;" onclick="return confirm('Delete this post ?');"><i class="fas fa-fw fa-trash-alt text-danger"></i></button>
                                </form>
                                @if($category->status == 0)
                                <form action="/founder/post/activatecategory/{{$category->slug}}" method="POST" class="d-inline">
                                    @csrf
                                    <button class="btn btn-sm btn-success" onclick="return confirm('Activate This category in Arahin ?');">Aktifkan</button>
                                </form>
                                @endif
                            </th>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection