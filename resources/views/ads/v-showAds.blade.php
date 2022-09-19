@extends('templates.adminLayout')

@section('title', '[Blog Post - Role]')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Tabel -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-dark d-inline">Ads</h6>
            <form action="/ads/{{$ads->id}}" method="POST" class="d-inline">
                @method('DELETE')
                @csrf
                <button class="float-right btn btn-danger btn-sm mr-2" onclick="return confirm('Delete this ads?');">Delete</button>
            </form>
            <a href="/ads/{{$ads->id}}/edit" class="float-right btn btn-warning btn-sm mr-2">Edit</a>
            <a href="/ads" class="float-right btn btn-danger btn-sm mr-2">Back</a>
        </div>
        <div class="card-body text-center">
            <img src="{{asset('storage/'. $ads->ads_url)}}" style="height: auto; width:auto; max-width:100%;" alt="">
        </div>
    </div>
</div>

@endsection