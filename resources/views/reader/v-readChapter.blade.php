@extends('templates.userLayout')
@section('title', ''.$bookchapter->title_chapter.'')
@section('content')
<main>
   <style>img{width:100% !important;}</style>
    <!-- About US Start -->
    <div class="about-area2 gray-bg pt-60 pb-60">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="about-right mb-90">
                        <div class="about-img">
                            <img src="{{asset('storage/'.$bookchapter->img_chapter)}}" alt="">
                        </div>
                        <div class="mb-10 pt-20">

                        </div>
                        <div class="heading-news mb-30 pt-30">
                            <h3>{{ $bookchapter->title_chapter }}</h3>
                            <h6 class="d-inline">Last Update - </h6><span class="badge badge-info "> {{ date('j F Y | G.i', strtotime($bookchapter->updated_at))}} </span>
                        </div>
                        <div class="about-prea">
			   <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-7326678056847065" crossorigin="anonymous"></script>
			   <ins class="adsbygoogle" style="display:block; text-align:center;" data-ad-layout="in-article" data-ad-format="fluid" data-ad-client="ca-pub-7326678056847065" data-ad-slot="5118415995"></ins>
			   <script> (adsbygoogle = window.adsbygoogle || []).push({}); </script>

                            {!! $bookchapter->body !!}
                        </div>
			<hr>
			<div class="fb-comments" data-href="https://arahin.ocumps.com/books/chapters/{{ $bookchapter->slug }}" data-width="100%" data-numbookchapters="5"></div>
                        <div class="social-share pt-30">
                            <div class="section-tittle">
                                <h3 class="mr-20">Share:</h3>
                                <ul>
                                    <li><a href="https://t.me/share/url?url={{url()->full()}}" title_chapter="Share to telegram" target="_blank"><img src="{{asset('template')}}/img/news/icon-tele.png" alt="" width="29px" height="29px"></a></li>
                                    <li><a href="http://www.facebook.com/sharer.php?u={{url()->full()}}&t={{$bookchapter->slug}}" title="Share to facebook" onclick="window.open(this.href); return false;"><img src="{{asset('template')}}/img/news/icon-fb.png" alt=""></a></li>
                                    <li><a href="https://twitter.com/share?text={{$bookchapter->slug}}&url={{url()->full()}}" title="Share to twitter" target="_blank"><img src="{{asset('template')}}/img/news/icon-tw.png" alt=""></a></li>
                                    <li><a href="https://api.whatsapp.com/send/?text={{url()->full()}}" title="Share to whatsapp" target="_blank"><img src="{{asset('template')}}/img/news/icon-wa.png" alt="" width="29px" height="29px"></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-lg-4">
                    <div class="container d-flex justify-content-center align-items-center mt-2">
                        <div class="rounded border border-color-dark p-3 text-center">
                            <div class="row">
                                    <div class="col-lg-6">
                                        @if($previousChapter != false)<a href="/books/chapters/{{$previousChapter->slug}}" class="btn btn-dark btn-sm rounded">Previous</a> @endif
                                    </div>
                                    <div class="col-lg-6">
                                        <a href="/books/chapters/{{$nextChapter->slug}}" class="btn btn-dark btn-sm rounded">Next</a>
                                    </div>
                            </div>
                        </div>
                    </div>

                    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-7326678056847065" crossorigin="anonymous"></script>
                    <!-- latest-read-vertical -->
                    <ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-7326678056847065" data-ad-slot="8433413851" data-ad-format="auto" data-full-width-responsive="true"></ins>
                    <script> (adsbygoogle = window.adsbygoogle || []).push({}); </script>
                </div>
            </div>
        </div>
    </div>
    <!-- About US End -->
</main>
@endsection
