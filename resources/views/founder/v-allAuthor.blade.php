@extends('templates.adminLayout')

@section('title', '[Blog Post - All Authors]')

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
            <h6 class="m-0 font-weight-bold text-dark d-inline">All Author</h6>
            <a href="/author/recruit" class="float-right"><i class="fas fa-fw fa-plus"></i></a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Joined Since</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Joined Since</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($authors as $author)
                        <tr>
                            <th>{{$loop->iteration}}</th>
                            <th>{{$author->name}}</th>
                            <th>{{$author->email}}</th>
                            <th>{{Carbon\Carbon::parse($author->created_at)->diffForHumans()}}</th>
                            <th>
                                <a href="/user/{{$author->username}}" class=""><i class="fas fa-fw fa-book-reader text-info"></i></a>
                                <form action="/mypost/posts/{{$author->id}}" method="POST" class="d-inline">
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