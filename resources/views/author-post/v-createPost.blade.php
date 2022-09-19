@extends('templates.adminLayout')

@section('title', '[Blog Post - Home]')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-dark d-inline">Post a content</h6>
    </div>
    <div class="card-body">
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <form action="/mypost/posts" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
              <label for="title" class="form-label">Title</label>
              <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{old('title')}}" required autofocus>
              @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3">
              <label for="slug" class="form-label">Slug</label>
              <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" disable readonly value="{{old('slug')}}">
              @error('slug')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="category" class="form-label">Category</label>
              <select class="form-control" name="category_id">
                @foreach($categories as $category)
                @if(old('category_id') == $category->id)
                <option value="{{$category->id}}" selected>{{$category->name}}</option>
                @else
                <option value="{{$category->id}}">{{$category->name}}</option>
                @endif
                @endforeach
              </select>
            </div>
            <div class="mb-3">
              <label for="image">Upload Image</label>
              <img class="img-preview img-fluid mb-3 col-sm-5">
              <input type="file" class="form-control-file @error('image') is-invalid @enderror" id="image" name="image" onchange="previewImage()">
              @error('image')
              <p class="text-danger">{{$message}}</p>
              @enderror
            </div>
            <div class="mb-3">
              <label for="body" class="form-label">Body</label>
              @error('body')
              <p class="text-danger">{{$message}}</p>
              @enderror
              <textarea name="body" class="my-editor form-control" id="body" cols="30" rows="10">{{old('body')}}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Create Post</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
<script>
  const title = document.querySelector('#title');
  const slug = document.querySelector('#slug');

  title.addEventListener('change', function() {
    fetch('/mypost/posts/createSlug?title=' + title.value)
      .then(response => response.json())
      .then(data => slug.value = data.slug)
  });

  CKEDITOR.replace('body');
</script>
<script>
  function previewImage() {
    const image = document.querySelector('#image');
    const imgPreview = document.querySelector('.img-preview');

    imgPreview.style.display = "block";

    const oFReader = new FileReader();
    oFReader.readAsDataURL(image.files[0]);

    oFReader.onload = function(oFREvent) {
      imgPreview.src = oFREvent.target.result;
    }
  }
</script>

@endsection
