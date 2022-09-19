@extends('templates.adminLayout')

@section('title', '[Arahin - Show Book]')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Trending Tittle -->
    <div class="row mb-5">
        <div class="col-lg-5">
            <div class="about-img" style="overflow:hidden; ">
                <img src="{{asset('storage/'.$book->img_cover_book)}}" width="100%" alt="">
            </div>
        </div>
        <div class="col-lg-7 mt-3">
            <ol class="list-group list-group-numbered mb-2">
                @foreach($chapters as $chapter)
                <a href="/founder/post/book/showchapter/{{$chapter->slug}}" class="text-decoration-none">
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto text-black">
                            <div class="fw-bold">Chapter {{$chapter->chapter}}</div>
                            "{{$chapter->title_chapter}}"
                        </div>
                        <span class="badge bg-danger text-white rounded-pill">{{$chapter->chapter}}</span>
                    </li>
                </a>
                @endforeach
            </ol>
            <!--Start pagination -->
            <nav aria-label="Page navigation example ">
                <ul class="pagination justify-content-start">
                    {{$chapters->links()}}
                </ul>
            </nav>
            <!-- End pagination  -->
        </div>
    </div>
</div>
@endsection