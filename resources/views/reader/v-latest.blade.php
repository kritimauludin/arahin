@extends('templates.userLayout')
@section('title', 'Latest Post - Arahin Media Kreasi')
@section('content')
<main>
	<style>img{width:100% !important;}</style>
        <!-- Latest Post US Start -->
        <div class="about-area2 gray-bg pt-60 pb-60">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <!-- Trending Tittle -->
                        <div class="about-right mb-90">
                            <div class="about-img">
                                <img src="{{asset('storage/'. $post->image)}}" alt="">
                            </div>
                            <div class="heading-news mb-30 pt-30">
                                <h3>{{ $post->title }}</h3>
                                <h6 class="d-inline">{{$post->category->name}} - </h6><span class="badge badge-info "> {{ date('d F Y | G.i', strtotime($post->published_at))}} </span>
                            </div>
                            <div class="about-prea">
				<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-7326678056847065" crossorigin="anonymous"></script>
				<ins class="adsbygoogle" style="display:block; text-align:center;" data-ad-layout="in-article" data-ad-format="fluid" data-ad-client="ca-pub-7326678056847065" data-ad-slot="5118415995"></ins>
				<script> (adsbygoogle = window.adsbygoogle || []).push({}); </script>

				<hr>

                                {!! $post->body !!}
                            </div>
			    <hr>
			    <div class="fb-comments" data-href="https://arahin.ocumps.com/read/{{ $post->slug }}" data-width="100%" data-numposts="5"></div>
                            <div class="social-share pt-30">
                                <div class="section-tittle">
                                    <h3 class="mr-20">Share:</h3>
                                    <ul>
                                        <li><a href="https://t.me/share/url?url={{url('/').'/read/'.$post->slug}}" title="Share to telegram" target="_blank"><img src="{{asset('template')}}/img/news/icon-tele.png" alt="" width="29px" height="29px"></a></li>
                                        <li><a href="http://www.facebook.com/sharer.php?u={{url('/').'/read/'.$post->slug}}&t={{$post->slug}}" title="Share to facebook" onclick="window.open(this.href); return false;"><img src="{{asset('template')}}/img/news/icon-fb.png" alt=""></a></li>
                                        <li><a href="https://twitter.com/share?text={{$post->slug}}&url={{url('/').'/read/'.$post->slug}}" title="Share to twitter" target="_blank"><img src="{{asset('template')}}/img/news/icon-tw.png" alt=""></a></li>
                                        <li><a href="https://api.whatsapp.com/send/?text={{url('/').'/read/'.$post->slug}}" title="Share to whatsapp" target="_blank"><img src="{{asset('template')}}/img/news/icon-wa.png" alt="" width="29px" height="29px"></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <!-- New Poster -->
                            <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-7326678056847065" crossorigin="anonymous"></script>
                            <!-- latest-read-vertical -->
                            <ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-7326678056847065" data-ad-slot="8433413851" data-ad-format="auto" data-full-width-responsive="true"></ins>
                            <script>
                              (adsbygoogle = window.adsbygoogle || []).push({});
                            </script>
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
                                        <span>0</span>
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
                        <!-- author info -->
                        <div class="container d-flex justify-content-center align-items-center mt-2">
                            <div class="card-author border border-color-dark">
                                <div class="upper"> <img src="https://blog.tripcetera.com/id/wp-content/uploads/2020/10/pulau-padar.jpg" class="img-fluid"> </div>
                                <div class="user text-center">
                                    <div class="profile">
                                        @if($post->author->user_data->img_profile)
                                        <img src="{{asset('storage/'. $post->author->user_data->img_profile)}}" class="rounded-circle" width="80">
                                        @else
                                        <img src="{{asset('storage'.'/img/user-profile/default.svg')}}" class="rounded-circle" width="80">
                                        @endif
                                    </div>
                                </div>
                                <div class="mt-5 text-center">
                                    <h4 class="mb-0">{{ $post->author->name }}</h4>
                                    <span class="text-muted d-block mb-2">{{$post->author->role->name}}</span>
                                    <p class="text-secondary mb-1"> "{{$post->author->user_data->about_yourself}}"</p>
                                    <div class="d-flex justify-content-center  align-items-center mt-4 px-4">
                                        <div class="stats mr-3">
                                            <h6 class="mb-0">Posts</h6> <span>{{$posts}}</span>
                                        </div>
                                        <div class="stats">
                                            <h6 class="mb-0">Books</h6> <span>{{$books}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Latest Post US End -->       
</main>
@endsection
