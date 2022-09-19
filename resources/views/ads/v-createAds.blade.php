@extends('templates.adminLayout')

@section('title', '[Blog Post - Ads]')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="col-lg-6">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-dark d-inline">Pasang Iklan</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12">
                        <form action="/ads" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Penyewa</label>
                                <input type="text" class="form-control @error('institution_name') is-invalid @enderror" id="institution_name" name="institution_name" value="{{old('institution_name')}}" required autofocus>
                                @error('institution_name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="mb-3">
                                <label for="category" class="form-label">Kategori</label>
                                <select class="form-control" name="categoryads_id">
                                    @foreach($categories_ads as $category_ads)
                                    <option value="{{$category_ads->id}}" @if($category_ads->status != 1) disabled @endif>{{$category_ads->category_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="ads_url">Upload Banner</label>
                                <input type="file" class="form-control @error('ads_url') is-invalid @enderror" id="ads_url" name="ads_url" onchange="previewImage()">
                                @error('ads_url')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary float-right">Pasang iklan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection