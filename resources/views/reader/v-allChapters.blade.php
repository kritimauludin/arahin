@extends('templates.userLayout')
@section('title', 'All Chapters Page - Arahin Media Kreasi')
@section('content')
<main>
    <div class="container mt-5">
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
                    <a href="/books/chapters/{{$chapter->slug}}" class="text-decoration-none">
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto text-dark">
                                <div class="badge badge-danger mb-2">Chapter {{$chapter->chapter}}</div>
                                <h5>"{{$chapter->title_chapter}}"</h5>
                            </div>
                            <span class="badge bg-info mt-3 text-white rounded-pill">{{date('d M Y', strtotime($chapter->created_at))}}</span>
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
</main>

@endsection