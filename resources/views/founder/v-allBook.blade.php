@extends('templates.adminLayout')

@section('title', '[Blog Post - Books]')

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
            <h6 class="m-0 font-weight-bold text-dark d-inline">All Books </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title Book</th>
                            <th>Category</th>
                            <th>Reader</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Title Book</th>
                            <th>Category</th>
                            <th>Reader</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($books as $book)
                        <tr>
                            <th>{{$loop->iteration}}</th>
                            <th>{{$book->title_book}}</th>
                            <th>{{$book->category->name}}</th>
                            <th>{{$readers[$loop->iteration-1]}}</th>
                            <th>
                                <a href="/founder/post/book/show/{{$book->slug}}" class=""><i class="fas fa-fw fa-book-reader text-info"></i></a>
                                <form action="/founder/post/book/delete/{{$book->slug}}" method="POST" class="d-inline">
                                    @method('DELETE')
                                    @csrf
                                    <button class="border-0 bg-transparant" style="background-color: transparent;" onclick="return confirm('Delete this book ?');"><i class="fas fa-fw fa-trash-alt text-danger"></i></button>
                                </form>
                                @if($book->status == 0)
                                <form action="/founder/post/book/publish/{{$book->slug}}" method="POST" class="d-inline">
                                    @csrf
                                    <button class="btn btn-sm btn-success" onclick="return confirm('Publish This Book in Arahin ?');">Terbitkan</button>

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