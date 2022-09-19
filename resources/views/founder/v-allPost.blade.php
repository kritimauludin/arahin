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
            <h6 class="m-0 font-weight-bold text-dark d-inline">All Posts</h6>
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
                            <th>Author</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Reader</th>
                            <th>Author</th>
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
                            <th>{{$post->author->name}}</th>
                            <th>
                                <a href="/founder/readpost/{{$post->slug}}" class=""><i class="fas fa-fw fa-book-reader text-info"></i></a>
                                <form action="/founder/post/delete/{{$post->slug}}" method="POST" class="d-inline">
                                    @method('DELETE')
                                    @csrf
                                    <button class="border-0 bg-transparant" style="background-color: transparent;" onclick="return confirm('Delete this post ?');"><i class="fas fa-fw fa-trash-alt text-danger"></i></button>
                                </form>
                                @if($post->status == 0)
                                <form action="/founder/post/publish/{{$post->slug}}" method="POST" class="d-inline">
                                    @csrf
                                    <button class="btn btn-sm btn-success" onclick="return confirm('Publish This Post in Arahin ?');">Terbitkan</button>
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