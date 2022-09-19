@extends('templates.adminLayout')

@section('title', '[Blog Post - Home]')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-dark d-inline">Edit Post</h6>
    </div>
    <div class="card-body">
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <form action="/mypost/posts/{{$post->slug}}" method="POST" enctype="multipart/form-data">
            @method('put')
            @csrf
            <input type="hidden" name="oldImage" value="{{$post->image}}">
            <div class="mb-3">
              <label for="title" class="form-label">Title</label>
              <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{old('title', $post->title)}}" required autofocus>
              @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3">
              <label for="slug" class="form-label">Slug</label>
              <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{old('slug', $post->slug)}}" disable readonly>
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
                @if(old('category_id', $post->category_id) == $category->id)
                <option value="{{$category->id}}" selected>{{$category->name}}</option>
                @else
                <option value="{{$category->id}}">{{$category->name}}</option>
                @endif
                @endforeach
              </select>
            </div>
            <div class="mb-3">
              <label for="image">Upload Image</label>
              @if($post->image)
              <img src="{{asset('storage/'. $post->image)}}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
              @else
              <img class="img-preview img-fluid mb-3 col-sm-5">
              @endif
              <input type="file" class="form-control-file @error('image') is-invalid @enderror" id="image" name="image" onchange="previewImage()">
              @error('image',)
              <p class="text-danger">{{$message}}</p>
              @enderror
            </div>
            <div class="mb-3">
              <label for="body" class="form-label">Body</label>
              @error('body')
              <p class="text-danger">{{$message}}</p>
              @enderror
              <textarea name="body" class="my-editor form-control" id="body" cols="30" rows="10">{{old('body', $post->body)}}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update Post</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

@push('scripts')
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
@endpush

@endsection