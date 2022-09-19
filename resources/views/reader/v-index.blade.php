
@extends('templates.userLayout')
@section('title', 'Homepage - Arahin Media Kreasi')
@section('content')
<?php
if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 'headline';
}
?>
@if(isset($posts[9]))
<main>
    <!-- Trending Area Start -->
    <div class="trending-area fix pt-25 gray-bg">
        <div class="container">
            <div class="trending-main">
                <div class="row">
                    <div class="col-lg-8">
                        <!-- Trending Top -->
                        <div class="slider-active">
                            @for($i=0; $i<7; $i++) <div class="single-slider">
                                <div class="trending-top mb-30">
                                    <div class="trend-top-img">
                                        <img src="{{asset('storage/'. $headline[$i]->image)}}" alt="">
                                        <div class="trend-top-cap">
                                            {{-- <a href="categories/{{ $headline[$i]->category->slug }}"><span class="bg{{$headline[$i]->category->slug == 'tugas' ? 'r' : $headline[$i]->category->slug == 'teknologi' ? 'b' : 'g' }}" data-animation="fadeInUp" data-delay=".2s" data-duration="1000ms">{{ $headline[$i]->category->name }}</span></a> --}}
                                            <h2><a href="read/{{ $headline[$i]->slug }}" class="text-decoration-none" data-animation="fadeInUp" data-delay=".4s" data-duration="1000ms">{{ $headline[$i]["title"] }}</a></h2>
                                            <p data-animation="fadeInUp" data-delay=".6s" data-duration="1000ms">by {{ $headline[$i]->author->name }} - {{Carbon\Carbon::parse($headline[$i]->published_at)->diffForHumans()}} </p>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        @endfor
                    </div>
                </div>
                <!-- Right content -->
                <div class="col-lg-4">
                    <!-- Trending Top -->
                    <div class="row">
                        <div class="col-lg-12 col-md-6 col-sm-6">
                            <div class="trending-top mb-30">
                                <div class="trend-top-img">
                                    <img src="{{asset('storage/'.$headline[8]->image) }}" alt="">
                                    <div class="trend-top-cap trend-top-cap2">
                                        <span class="bgb">{{ $headline[8]->category->name }}</span>
                                        <h2><a href="read/{{ $headline[8]->slug }}" class="text-decoration-none">{{ $headline[8]["title"] }}</a></h2>
                                        <p>by {{ $headline[8]->author->name }} - {{Carbon\Carbon::parse($headline[8]->published_at)->diffForHumans()}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-6 col-sm-6">
                            <div class="trending-top mb-30">
                                <div class="trend-top-img">
                                    <img src="{{asset('storage/'.$headline[9]->image)}}" alt="">
                                    <div class="trend-top-cap trend-top-cap2">
                                        <span class="bgg">{{ $headline[9]->category->name }}</span>
                                        <h2><a href="read/{{ $headline[9]->slug }}" class="text-decoration-none">{{ $headline[9]->title }}</a></h2>
                                        <p>by {{ $headline[9]->author->name }} - {{Carbon\Carbon::parse($headline[9]->published_at)->diffForHumans()}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Trending Area End -->

    <!-- Whats New Start -->
    <section class="whats-news-area pt-50 pb-20 gray-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="whats-news-wrapper">
                        <!-- Heading & Nav Button -->
                        <div class="row justify-content-between align-items-end mb-15" id="section-new">
                            <div class="col-xl-4">
                                <div class="section-tittle mb-30">
                                    <h3>Whats New</h3>
                                </div>
                            </div>
                            <div class="col-xl-8 col-md-9">
                                <div class="properties__button">
                                    <!--Nav Button  -->
                                    <nav>
                                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                            @foreach($categories as $category)
                                            <a class="nav-item nav-link {{$page == $category->slug ? 'active' : ' '}}" id="tabContent" href="?page={{$category->slug}}#section-new">{{$category->name}}</a>
                                            @endforeach
                                        </div>
                                    </nav>
                                    <!--End Nav Button  -->
                                </div>
                            </div>
                        </div>
                        <!-- Tab content -->
                        <div class="row">
                            <div class="col-lg-12">
                                <!-- Nav Card -->
                                <div class="tab-content" id="nav-tabContent">
                                    <!-- card one -->
                                    @for($i=0; $i<=count($postCategory)-1; $i++) <div class="tab-pane fade {{$page == $categories[$i]->slug ? 'show active' : ' '}}" id="nav-{{$category->slug}}" role="tabpanel" aria-labelledby="nav-home-tab">
                                        <div class="row">
                                            @foreach($postCategory[$i] as $post)
                                            <!-- single -->
                                            <div class="col-lg-6">
                                                <div class="whats-right-single mb-15">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="whats-right-img">
                                                                <a href="/read/{{$post->slug}}">
                                                                    <img style="width: 100%;" src="{{asset('storage/'. $post->image)}}" alt="">
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="whats-right-cap">
                                                                <span class="colorb">{{$post->category->name}}</span>
                                                                <h4><a href="/read/{{$post->slug}}" class="text-decoration-none">{{$post->title}}</a></h4>
                                                                <p>{{Carbon\Carbon::parse($post->published_at)->diffForHumans()}}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                </div>
                                @endfor
                            </div>
                            <!-- End Nav Card -->
                        </div>
                    </div>
                </div>
                <!-- Banner -->
                <div class="banner-one mt-20 mb-30">
                     <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-7326678056847065" crossorigin="anonymous"></script>
                     <!-- mid-horizontal -->
                     <ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-7326678056847065" data-ad-slot="6271296702" data-ad-format="auto" data-full-width-responsive="true"></ins>
                     <script>
                        (adsbygoogle = window.adsbygoogle || []).push({});
                     </script>
                </div>
            </div>
            <div class="col-lg-4">
                <!-- Flow Socail 
                <div class="single-follow mb-10">
                    <div class="single-box">
                        <div class="follow-us d-flex align-items-center">
                            <div class="follow-social">
                                <a href="#"><img src="{{asset('template')}}/img/news/icon-fb.png" alt=""></a>
                            </div>
                            <div class="follow-count">
                                <span>0</span>
                                <p>Fans</p>
                            </div>
                        </div>
                        <div class="follow-us d-flex align-items-center">
                            <div class="follow-social">
                                <a href="#"><img src="{{asset('template')}}/img/news/icon-tw.png" alt=""></a>
                            </div>
                            <div class="follow-count">
                                <span>0</span>
                                <p>Fans</p>
                            </div>
                        </div>
                        <div class="follow-us d-flex align-items-center">
                            <div class="follow-social">
                                <a href="#"><img src="{{asset('template')}}/img/news/icon-ins.png" alt=""></a>
                            </div>
                            <div class="follow-count">
                                <span id="ig">{{ $followers["instagramFollowers"] }}</span>
                                <p>Fans</p>
                            </div>
                        </div>
                        <div class="follow-us d-flex align-items-center">
                            <div class="follow-social">
                                <a href="#"><img src="{{asset('template')}}/img/news/icon-yo.png" alt=""></a>
                            </div>
                            <div class="follow-count">
                                <span>0</span>
                                <p>Fans</p>
                            </div>
                        </div>
                    </div>
                </div> -->

		<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-7326678056847065" crossorigin="anonymous"></script>
		<!-- latest-read-vertical -->
		<ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-7326678056847065" data-ad-slot="8433413851" data-ad-format="auto" data-full-width-responsive="true"></ins>
		<script>(adsbygoogle = window.adsbygoogle || []).push({});</script>

		<hr>

                <!-- Most Recent Area -->
                <div class="most-recent-area">
                    <!-- Section Tittle -->
                    <div class="small-tittle mb-20">
                        <h4>Terbaru</h4>
                    </div>
                    <!-- Details -->
                    <div class="most-recent mb-40">
                        <div class="most-recent-img">
                            <img src="{{asset('storage/'. $posts[0]->image)}}" width="100px" alt="">
                            <div class="most-recent-cap">
                                <span class="bgbeg">{{$posts[0]->category->name}}</span>
                                <h4><a href=" /read/{{$posts[0]->slug}}" class="text-decoration-none">{{$posts[0]->title}}</a></h4>
                                <p>{{$posts[0]->author->name}} | {{ Carbon\Carbon::parse($posts[0]->published_at)->diffForHumans()}}</p>
                            </div>
                        </div>
                    </div>
                    <!-- Single -->
                    <?php for ($i = 1; $i <= 4; $i++) : ?>
                        <div class="most-recent-single">
                            <div class="most-recent-images">
                                <a href="/read/{{$posts[$i]->slug}}">
                                    <img style="max-height: 100px; max-width:100px;" src="{{asset('storage/'. $posts[$i]->image)}}" alt="">
                                </a>
                            </div>
                            <div class="most-recent-capt">

                                <h4><a href="/read/{{$posts[$i]->slug}}" class="text-decoration-none">{{$posts[$i]->title}}</a></h4>
                                <p>{{$posts[$i]->author->name}} | {{Carbon\Carbon::parse($posts[$i]->published_at)->diffForHumans()}}</p>
                            </div>
                        </div>
                    <?php endfor; ?>
                </div>
            </div>
        </div>
        </div>
    </section>
    <!-- Whats New End -->
    <!--   Weekly2-News start -->
    <div class="weekly2-news-area pt-20 pb-20 gray-bg">
        <div class="container">
            <div class="weekly2-wrapper">
                <div class="row">
                    <!-- Banner 
                    <div class="col-lg-3">
                        <div class="home-banner2 d-none d-lg-block">
                            @if(isset($leftHome263[0]))
                            <img src="{{asset('storage/'. $leftHome263[0]->ads_url)}}" alt="">
                            @else
                            <img src="{{asset('storage/')}}/img/ads/default-ads3.png" alt="">
                            @endif
                        </div>
                    </div> -->
                    <div class="col-lg-12">
                        <div class="slider-wrapper">
                            <!-- section Tittle -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="small-tittle mb-30">
                                        <h4>Paling Banyak Dibaca</h4>
                                    </div>
                                </div>
                            </div>
                            <!-- Slider -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="weekly2-news-active d-flex">
                                        <!-- Single -->
                                        <?php foreach ($mostReader as $mostRead) : ?>
                                            <div class="weekly2-single">
                                                <div class="weekly2-img">
                                                    <img src="{{asset('storage/'. $mostRead->image)}}" alt="">
                                                </div>
                                                <div class="weekly2-caption">
                                                    <h4><a href="/read/{{$mostRead->slug}}" class="text-decoration-none">{{$mostRead->title}}</a></h4>
                                                    <p>Dibaca {{$mostRead->reader}} kali</p>
                                                    <p>{{$mostRead->author->name}} | {{Carbon\Carbon::parse($mostRead->published_at)->diffForHumans()}}</p>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Weekly-News -->
    <!--  Recent Articles start -->
    <div class="recent-articles pt-80 pb-80">
        <div class="container">
            <div class="slider-wrapper">
                <!-- section Tittle -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-tittle mb-30">
                            <h3>Trending</h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="recent-active dot-style d-flex dot-style">
                            @foreach($trending as $trend)
                            <div class="single-recent">
                                <div class="what-img">
                                    <img src="{{asset('storage/'. $trend->image)}}" alt="">
                                </div>
                                <div class="what-cap">
                                    <h4><a href="/read/{{$trend->slug}}">{{ $trend->title}}</a></h4>
                                    <P>{{ date('M j, Y', strtotime($post->published_at))}}</P>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

	    <hr>

	    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-7326678056847065" crossorigin="anonymous"></script>
      	    <!-- mid-horizontal -->
	    <ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-7326678056847065" data-ad-slot="6271296702" data-ad-format="auto" data-full-width-responsive="true"></ins>
	    <script> (adsbygoogle = window.adsbygoogle || []).push({}); </script>
        </div>
    </div>
    <!--Recent Articles End -->
    <!-- Start Video Area -->
    @if (isset($youtube))
        class="youtube-area video-padding d-none d-sm-block">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="video-items-active">
                        <div class="video-items text-center">
                            <video controls>
                                <source src="{{asset('template')}}/video/news2.mp4" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        </div>
                        <div class="video-items text-center">
                            <video controls>
                                <source src="{{asset('template')}}/video/news1.mp4" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        </div>
                        <div class="video-items text-center">
                            <video controls>
                                <source src="{{asset('template')}}/video/news3.mp4" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        </div>
                        <div class="video-items text-center">
                            <video controls>
                                <source src="{{asset('template')}}/video/news1.mp4" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        </div>
                        <div class="video-items text-center">
                            <video controls>
                                <source src="{{asset('template')}}/video/news3.mp4" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        </div>
                    </div>
                </div>
            </div>
            <div class="video-info">
                <div class="row">
                    <div class="col-12">
                        <div class="testmonial-nav text-center">
                            <div class="single-video">
                                <video controls>
                                    <source src="{{asset('template')}}/video/news2.mp4" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                                <div class="video-intro">
                                    <h4>Old Spondon News - 2020 </h4>
                                </div>
                            </div>
                            <div class="single-video">
                                <video controls>
                                    <source src="{{asset('template')}}/video/news1.mp4" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                                <div class="video-intro">
                                    <h4>Banglades News Video </h4>
                                </div>
                            </div>
                            <div class="single-video">
                                <video controls>
                                    <source src="{{asset('template')}}/video/news3.mp4" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                                <div class="video-intro">
                                    <h4>Latest Video - 2020 </h4>
                                </div>
                            </div>
                            <div class="single-video">
                                <video controls>
                                    <source src="{{asset('template')}}/video/news1.mp4" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                                <div class="video-intro">
                                    <h4>Spondon News -2019 </h4>
                                </div>
                            </div>
                            <div class="single-video">
                                <video controls>
                                    <source src="{{asset('template')}}/video/news3.mp4" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                                <div class="video-intro">
                                    <h4>Latest Video - 2020</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
    <div 
    <!-- End Start Video area-->
    <!--   Weekly3-News start -->
    <div class="weekly3-news-area pt-80 pb-130">
        <div class="container">
            <div class="weekly3-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="slider-wrapper">
                            <!-- Slider -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="weekly3-news-active dot-style d-flex">
                                        @for($i=5; $i<=9; $i++) <div class="weekly3-single">
                                            <div class="weekly3-img">
                                                <img src="{{asset('storage/'. $posts[$i]->image)}}" alt="">
                                            </div>
                                            <div class="weekly3-caption">
                                                <h4><a href="/read/{{$posts[$i]->slug}}" class="text-decoration-none">{{$posts[$i]->title}}</a></h4>
                                                <p>{{date('j M Y', strtotime($posts[$i]->published_at))}}</p>
                                            </div>
                                    </div>
                                    @endfor
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- End Weekly-News -->
    <!-- banner-last Start 
    <div class="banner-area gray-bg pt-90 pb-90">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10 col-md-10">
                    <div class="banner-one">
                        @if(isset($bannerFoot[0]))
                        <img src="{{asset('storage/'. $bannerFoot[0]->ads_url)}}" style="max-height: 156px;" alt="">
                        @else
                        <img src="{{asset('storage')}}/img/ads/default-ads4.png" alt="">
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    banner-last End -->
</main>
@else
<h1 class="m-5">Nothing New In Arahin</h1>
@endif

@endsection
