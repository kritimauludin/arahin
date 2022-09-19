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
            <h6 class="m-0 font-weight-bold text-dark d-inline">Pengguna Dengan role ({{$roles[0]->name}})</h6>
            <a href="/roles" class="btn btn-sm btn-danger float-right">Kembali</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        @for($i=0; $i<count($roles[0]->user); $i++)
                            <tr>
                                <th>{{$i+1}}</th>
                                <th>{{$roles[0]->user[$i]->name}}</th>
                                <th>{{$roles[0]->user[$i]->username}}</th>
                                <th>{{$roles[0]->user[$i]->email}}</th>
                            </tr>
                            @endfor
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection