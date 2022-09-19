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
            <h6 class="m-0 font-weight-bold text-dark d-inline">All User</h6>
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
                        @foreach($users as $user)
                        <tr>
                            <th>{{$loop->iteration}}</th>
                            <th>{{$user->name}}</th>
                            <th>{{$user->email}}</th>
                            <th>{{Carbon\Carbon::parse($user->created_at)->diffForHumans()}}</th>
                            <th>
				@if($user->email_verified_at == null)
				   <a href="#" onclick="alert('User Email Not Verified!!')"><i class="fas fa-fw fa-spinner text-info"></i></a>
				@else
                                   <a href="/user/{{$user->username}}" class=""><i class="fas fa-fw fa-book-reader text-info"></i></a>
				@endif
                                <form action="/user/{{$user->username}}" method="POST" class="d-inline">
                                    @method('DELETE')
                                    @csrf
                                    <button class="border-0 bg-transparant" style="background-color: transparent;" onclick="return confirm('Delete this user ?');"><i class="fas fa-fw fa-trash-alt text-danger"></i></button>
                                </form>
                                @if($user->role->id == 5)
                                <form action="/founder/user/rekrut/{{$user->username}}" method="POST" class="d-inline">
                                    @csrf
                                    <button class="btn btn-sm btn-success" onclick="return confirm('Recruit this user to be author in Arahin ?');">Rekrut</button>
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
