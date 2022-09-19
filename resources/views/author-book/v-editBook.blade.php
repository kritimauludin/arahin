@extends('templates.adminLayout')

@section('title', '[Arahin - Create Book]')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-dark d-inline">Edit Book</h6>
        </div>
        <div class="card-body">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <form action="/mybook/books/{{$book->slug}}" method="POST" enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <input type="hidden" name="oldImage" value="{{$book->img_cover_book}}">
                        <div class="mb-3">
                            <label for="title_book" class="form-label">Title</label>
                            <input type="text" class="form-control @error('title_book') is-invalid @enderror" id="title_book" name="title_book" value="{{old('title_book', $book->title_book)}}" required autofocus>
                            @error('title_book')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="mb-3">
                            <label for="slug" class="form-label">Slug</label>
                            <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" disable readonly value="{{old('slug', $book->slug)}}">
                            @error('slug')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="category_id" class="form-label">Category</label>
                            <select class="form-control" name="category_id">
                                @foreach($categories as $category)
                                @if(old('category_id', $book->category_id) == $category->id)
                                <option value="{{$category->id}}" selected>{{$category->name}}</option>
                                @else
                                <option value="{{$category->id}}">{{$category->name}}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="excerpt_book">Prakata</label>
                            @error('excerpt_book')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                            <textarea class="form-control" name="excerpt_book" id="excerpt_book" rows="5">{{$book->excerpt_book}}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="img_cover_book">Upload Cover Book</label>
                            @if($book->img_cover_book)
                            <img src="{{asset('storage/'. $book->img_cover_book)}}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
                            @else
                            <img class="img-preview img-fluid mb-3 col-sm-5">
                            @endif
                            <input type="file" class="form-control-file @error('img_cover_book') is-invalid @enderror" id="img_cover_book" name="img_cover_book" onchange="previewImage()">
                            @error('img_cover_book')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <a href="/mybook/books" class="btn btn-danger">Cancle</a>
                        <button type="submit" class="btn btn-primary">Update Book</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    const title_book = document.querySelector('#title_book');
    const slug = document.querySelector('#slug');

    title_book.addEventListener('change', function() {
        fetch('/mybook/books/createSlug?title_book=' + title_book.value)
            .then(response => response.json())
            .then(data => slug.value = data.slug)
    });
</script>
<script>
    function previewImage() {
        const img_cover_book = document.querySelector('#img_cover_book');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = "block";

        const oFReader = new FileReader();
        oFReader.readAsDataURL(img_cover_book.files[0]);

        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }
</script>

@endsection