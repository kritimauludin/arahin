@extends('templates.adminLayout')

@section('title', '[Blog Post - Home]')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
  <div class="row mt-5">
    <div class="col-lg-6">
      <form action="/mycategory/categories/{{$category->slug}}" method="POST">
        @method('put')
        @csrf
        <div class="mb-3">
          <label for="name" class="form-label">Category Name</label>
          <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{old('name', $category->name)}}" required autofocus>
          @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
          <label for="slug" class="form-label">Slug</label>
          <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" disable readonly value="{{old('slug', $category->slug)}}">
          @error('slug')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
        <button type="submit" class="btn btn-primary float-right">Accept Category</button>
      </form>
    </div>
  </div>
</div>

<script>
  const title = document.querySelector('#name');
  const slug = document.querySelector('#slug');

  title.addEventListener('change', function() {
    fetch('/mycategory/categories/createSlug?name=' + title.value)
      .then(response => response.json())
      .then(data => slug.value = data.slug)
  });
</script>

@endsection