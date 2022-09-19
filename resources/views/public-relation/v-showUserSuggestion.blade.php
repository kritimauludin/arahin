@extends('templates.adminLayout')

@section('title', '[Blog Post - Home]')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Trending Tittle -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-dark d-inline">Data Pengirim Saran</h6>
        </div>
        <div class="card-body">
            <div class="col-lg-12">
                <div class="card-body">
                    <div class="row mb-3">
                        <a href="/relation/usersuggestions" class="btn btn-success mr-2"><i class="fas fa-fw fa-arrow-left"></i> Back</a>
                        <h4></h4>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-4 mb-2">
                            <input type="text" class="form-control" value="{{$userSuggestion->name}}" readonly>
                        </div>
                        <div class="col-lg-4 mb-2">
                            <input type="text" class="form-control" value="{{$userSuggestion->subject}}" readonly>
                        </div>
                        <div class="col-lg-4 mb-2">
                            <input type="text" class="form-control" value="{{$userSuggestion->email}}" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <textarea class="form-control" name="" id="" cols="30" readonly>{{$userSuggestion->message}}</textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection