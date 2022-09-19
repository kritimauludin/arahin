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
                        <form action="/ads/{{$ads->id}}" method="POST" enctype="multipart/form-data">
                            @method('put')
                            @csrf
                            <input type="hidden" name="oldImage" value="{{$ads->ads_url}}">
                            <div class="mb-3">
                                <label for="name" class="form-label">Penyewa</label>
                                <input type="text" class="form-control @error('institution_name') is-invalid @enderror" id="institution_name" name="institution_name" value="{{old('institution_name', $ads->institution_name)}}" required autofocus>
                                @error('institution_name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="mb-3">
                                <label for="category" class="form-label">Kategori</label>
                                <select class="form-control" name="categoryads_id">
                                    @foreach($categories_ads as $category_ads)
                                    @if(old('category_ads', $ads->categoryads_id) ==$category_ads->id)
                                    <option value="{{$category_ads->id}}" @if($category_ads->status != 1) disabled @endif selected>{{$category_ads->category_name}}</option>
                                    @else
                                    <option value="{{$category_ads->id}}" @if($category_ads->status != 1) disabled @endif>{{$category_ads->category_name}}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select class="form-control" name="status">
                                    @for($i=0; $i<=1;$i++) <option value="{{$i}}" @if($i==$ads->status) selected @endif> @if($i==1) Aktif @else Nonaktif @endif </option> @endfor
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="ads_url">Upload Banner</label>
                                @if($ads->ads_url)
                                <img src="{{asset('storage/'. $ads->ads_url)}}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
                                @else
                                <img class="img-preview img-fluid mb-3 col-sm-5">
                                @endif
                                <input type="file" class="form-control @error('ads_url') is-invalid @enderror" id="ads_url" name="ads_url" onchange="previewImage()">
                                @error('ads_url')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary float-right">Edit iklan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function previewImage() {
        const ads_url = document.querySelector('#ads_url');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = "block";

        const oFReader = new FileReader();
        oFReader.readAsDataURL(ads_url.files[0]);

        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }
</script>
@endsection