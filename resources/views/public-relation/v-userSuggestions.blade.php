@extends('templates.adminLayout')

@section('title', '[Blog Post - Home]')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- alert -->
    @if(session()->has('success'))
    <div class="alert alert-success" role="alert">
        {{session('success')}}
    </div>
    @endif
    <!-- Tabel -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-dark d-inline">Saran Pengguna</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Subject</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Subject</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($userSuggestions as $userSuggestion)
                        <tr>
                            <th>{{$loop->iteration}}</th>
                            <th>{{$userSuggestion->name}}</th>
                            <th>{{$userSuggestion->subject}}</th>
                            <th>{{$userSuggestion->email}}</th>
                            <th>
                                <a href="/relation/showusersuggestion/{{$userSuggestion->id}}" class=""><i class="fas fa-fw fa-book-reader text-info"></i></a>
                                <form action="/relation/deleteusersuggestion/{{$userSuggestion->id}}" method="POST" class="d-inline">
                                    @method('DELETE')
                                    @csrf
                                    <button class="border-0 bg-transparant" style="background-color: transparent;" onclick="return confirm('Delete this user suggestion ?');"><i class="fas fa-fw fa-trash-alt text-danger"></i></button>
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