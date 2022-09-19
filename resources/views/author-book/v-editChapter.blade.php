@extends('templates.adminLayout')

@section('title', '[Arahin - New Chapter Book]')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="col-lg-8">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-dark d-inline">{{$book[0]->title_book}} - Chapter {{$chapter->chapter}}</h6>
            </div>
            <div class="card-body">
                <form action="/mybook/chapters/{{$chapter->slug}}" method="POST" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <input type="hidden" name="oldImage" value="{{$chapter->img_chapter}}">
                    <div class="mb-3">
                        <label for="title_chapter" class="form-label">Title Chapter</label>
                        <input type="text" class="form-control @error('title_chapter') is-invalid @enderror" id="title_chapter" name="title_chapter" value="{{old('title_chapter', $chapter->title_chapter)}}" required autofocus>
                        @error('title_chapter')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="mb-3">
                        <label for="slug" class="form-label">Slug</label>
                        <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" disable readonly value="{{old('slug', $chapter->slug)}}">
                        @error('slug')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="body" class="form-label">Body</label>
                        @error('body')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                        <textarea name="body" class="my-editor form-control" id="body" cols="30" rows="10">{{old('body', $chapter->body)}}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="img_chapter">Upload Cover Chapter</label>
                        @if($chapter->img_chapter)
                        <img src="{{asset('storage/'. $chapter->img_chapter)}}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
                        @else
                        <img class="img-preview img-fluid mb-3 col-sm-5">
                        @endif
                        <input type="file" class="form-control-file @error('img_chapter') is-invalid @enderror" id="img_chapter" name="img_chapter" onchange="previewImage()">
                        @error('img_chapter')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <a href="/mybook/chapters/{{$chapter->slug}}" class="btn btn-danger">Cancle</a>
                    <button type="submit" class="btn btn-primary">Update Chapter</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
<script>
    const title_chapter = document.querySelector('#title_chapter');
    const slug = document.querySelector('#slug');

    title_chapter.addEventListener('change', function() {
        fetch('/mybook/chapters/createSlug?title_chapter=' + title_chapter.value)
            .then(response => response.json())
            .then(data => slug.value = data.slug)
    });

    CKEDITOR.replace('body');
</script>
<script>
    function previewImage() {
        const img_chapter = document.querySelector('#img_chapter');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = "block";

        const oFReader = new FileReader();
        oFReader.readAsDataURL(img_chapter.files[0]);

        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }
</script>

@endsection