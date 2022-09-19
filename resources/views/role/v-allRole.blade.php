@extends('templates.adminLayout')

@section('title', '[Blog Post - Role]')

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
            <h6 class="m-0 font-weight-bold text-dark d-inline">Role</h6>
            <a href="/roles/create" class="float-right"><i class="fas fa-fw fa-plus"></i></a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Role Name</th>
                            <th>Active Since</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Role Name</th>
                            <th>Active Since</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($roles as $role)
                        <tr>
                            <th>{{$loop->iteration}}</th>
                            <th>{{$role->name}}</th>
                            <th>{{$role->created_at}}</th>
                            <th>
                                <a href="/roles/{{$role->id}}" class=""><i class="fas fa-fw fa-book-reader text-info"></i></a>
                                <a href="/roles/{{$role->id}}/edit" class=""><i class="fas fa-fw fa-edit text-warning"></i></a>
                                <form action="/roles/{{$role->id}}" method="POST" class="d-inline">
                                    @method('DELETE')
                                    @csrf
                                    <button class="border-0 bg-transparant" style="background-color: transparent;" onclick="return confirm('Delete this role?');"><i class="fas fa-fw fa-trash-alt text-danger"></i></button>
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