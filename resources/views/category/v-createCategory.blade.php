@extends('templates.adminLayout')

@section('title', '[Blog Post - Home]')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-dark d-inline">Form pengajuan kategori</h6>
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col-lg-6">
          <form action="/mycategory/categories" method="POST">
            @csrf
            <div class="mb-3">
              <label for="category_for" class="form-label">Category For</label>
              <select class="form-control" name="category_for">
                <option value="book">Book</option>
                <option value="post">Post</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="name" class="form-label">Category Name</label>
              <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{old('name')}}" required autofocus>
              @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3">
              <label for="slug" class="form-label">Slug</label>
              <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" disable readonly value="{{old('slug')}}">
              @error('slug')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <button type="submit" class="btn btn-primary float-right">Ajukan</button>
          </form>
        </div>
      </div>
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