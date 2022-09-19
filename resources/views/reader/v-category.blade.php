@extends('templates.userLayout')
@section('title', 'Arahin Media Kreasi - '.$category->name.'')
@section('content')
<?php
if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 'teknologi';
}
?>

<main>
    <!-- About US Start -->
    <div class="about-area2 gray-bg pt-60 pb-60">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="whats-news-wrapper">
                        <!-- Heading & Nav Button -->
                        <div class="row justify-content-between align-items-end mb-15">
                            <div class="col-xl-12">
                                <div class="section-tittle mb-30">
                                    <h3>
                                        @if(isset($posts[0]))
                                        Whats New On
                                        @else
                                        Nothing New On
                                        @endif - {{$category->name}}
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <!-- Tab content -->
                        <div class="row">
                            <div class="col-12">
                                <!-- Nav Card -->
                                <div class="tab-content" id="nav-tabContent">
                                    <!-- card one -->
                                    <div class="row">
                                        @foreach($posts as $post)
                                        <div class="col-xl-6 col-lg-6 col-md-6">
                                            <div class="whats-news-single mb-40 mb-40">
                                                <div class="whates-img">
                                                    <img src="{{asset('storage/'.$post->image)}}" alt="">
                                                </div>
                                                <div class="whates-caption whates-caption2">
                                                    <h4><a href="/read/{{ $post->slug }}" class="text-decoration-none">{{$post->title}}</a></h4>
                                                    <span>by {{ $post->author->name }} - {{ $post->published_at }}</span>
                                                    <p>{!! $post->excerpt !!}</p>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                <!-- End Nav Card -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <!-- New Poster -->
			<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-7326678056847065" crossorigin="anonymous"></script>
			<!-- latest-read-vertical -->
			<ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-7326678056847065" data-ad-slot="8433413851" data-ad-format="auto" data-full-width-responsive="true"></ins>
			<script>(adsbygoogle = window.adsbygoogle || []).push({});</script>

			<hr>

		    <div class="news-poster d-none d-lg-block mb-2">
                        @if(isset($bannerAds[0]))
                        <img src="{{asset('storage/'. $bannerAds[0]->ads_url)}}" alt="">
                        @else
                            <img src="{{asset('storage')}}/img/ads/default_adsnews.png" alt="">
			@endif
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
