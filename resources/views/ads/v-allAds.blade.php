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
            <h6 class="m-0 font-weight-bold text-dark d-inline">Ads</h6>
            <a href="/ads/create" class="float-right"><i class="fas fa-fw fa-plus"></i></a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Institusi Name</th>
                            <th>Ads Category</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($ads as $ads)
                        <tr>
                            <th>{{$loop->iteration}}</th>
                            <th>{{$ads->institution_name}}</th>
                            <th>{{$ads->categoryAds->category_name}}</th>
                            <th> @if($ads->status == 1)
                                <span class="badge badge-success">Aktif</span>
                                @else
                                <span class="badge badge-danger">Nonaktif</span>
                                @endif
                            </th>
                            <th>
                                <a href="/ads/{{$ads->id}}" class=""><i class="fas fa-fw fa-book-reader text-info"></i></a>
                                <a href="/ads/{{$ads->id}}/edit" class=""><i class="fas fa-fw fa-edit text-warning"></i></a>
                                <form action="/ads/{{$ads->id}}" method="POST" class="d-inline">
                                    @method('DELETE')
                                    @csrf
                                    <button class="border-0 bg-transparant" style="background-color: transparent;" onclick="return confirm('Delete this ads?');"><i class="fas fa-fw fa-trash-alt text-danger"></i></button>
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