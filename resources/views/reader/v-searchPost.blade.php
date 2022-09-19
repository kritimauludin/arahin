@extends('templates.userLayout')
@section('title', 'Search Page - Arahin Media Kreasi')
@section('content')

<main>
    <!-- About US Start -->
    <div class="about-area2 gray-bg pt-60 pb-60">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="whats-news-wrapper">
                        <!-- Heading & Nav Button -->
                        <div class="row mb-15">
                            <div class="section-tittle mb-30">
                                @if( $posts->count())
                                <h3>Hasil Pencarian </h3>
                                @else
                                <h3>Hasil Pencarian Tidak ada</h3>
                                @endif
                            </div>
                        </div>
                        <!-- Tab content -->
                        <div class="row">
                            <div class="col-12">
                                <!-- Nav Card -->
                                <div class="tab-content" id="nav-tabContent">
                                    <!-- card one -->
                                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                        <div class="row">
                                            @foreach ($posts as $post)
                                            <div class="col-xl-4 col-lg-4 col-md-4">
                                                <div class="whats-news-single mb-40 mb-40">
                                                    <div class="whates-img">
                                                        <img src="{{asset('storage/'.$post->image)}}" alt="">
                                                    </div>
                                                    <div class="whates-caption whates-caption2">
                                                        <h4><a href="/read/{{ $post->slug }}" class="text-decoration-none">{{$post->title}}</a></h4>
                                                        <span>by {{ $post->author->name }} - {{Carbon\Carbon::parse($post->published_at)->diffForHumans()}}</span>
                                                        <p>{!! $post->excerpt !!}</p>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <!-- End Nav Card -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About US End -->
    <!--Start pagination -->
    <div class="pagination-area  gray-bg pb-45">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="single-wrap">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-start">
                                {{$posts->links()}}
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End pagination  -->
</main>
@endsection
