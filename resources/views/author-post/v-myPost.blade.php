@extends('templates.adminLayout')

@section('title', '[Blog Post - Home]')

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
            <h6 class="m-0 font-weight-bold text-dark d-inline">My Post </h6>
            <a href="/mypost/posts/create" class="float-right"><i class="fas fa-fw fa-plus"></i></a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Reader</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Reader</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($posts as $post)
                        <tr>
                            <th>{{$loop->iteration}}</th>
                            <th>{{$post->title}}</th>
                            <th>{{$post->category->name}}</th>
                            <th>{{$post->reader}}</th>
                            <th>
                                @if($post->status == 1)
                                <span class="badge badge-success">Diterbitkan</span>
                                @else
                                <span class="badge badge-info">Ditinjau</span>
                                @endif
                            </th>
                            <th>
                                <a href="/mypost/posts/{{$post->slug}}" class=""><i class="fas fa-fw fa-book-reader text-info"></i></a>
                                <a href="/mypost/posts/{{$post->slug}}/edit" class=""><i class="fas fa-fw fa-edit text-warning"></i></a>
                                <form action="/mypost/posts/{{$post->slug}}" method="POST" class="d-inline">
                                    @method('DELETE')
                                    @csrf
                                    <button class="border-0 bg-transparant" style="background-color: transparent;" onclick="return confirm('Delete this post ?');"><i class="fas fa-fw fa-trash-alt text-danger"></i></button>
                                </form>
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