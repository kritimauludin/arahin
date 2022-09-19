<header>
    <!-- Header Start -->
    <div class="header-area">
        <div class="main-header ">
            <div class="header-top black-bg d-none d-sm-block">
                <div class="container-fluid">
                    <div class="col-xl-12">
                        <div class="row d-flex justify-content-between align-items-center">
                            <div class="col-lg-3">
                                <div class="header-info-left mt-2">
                                    <ul>

                                        <li class="title">
                                            <img src="{{asset('storage')}}/img/web-arahin/preload/icon.svg"  class="img-icon" alt="">
                                            <div id="captDisplay" class="ml-15"></div>
                                        </li>
                                        <li></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="d-flex justify-content-between align-items-center breaking-news">
                                    <marquee class="news-scroll " behavior="scroll" direction="left" onmouseover="this.stop();" onmouseout="this.start();">
                                        @foreach($runningNews as $runNews)
                                        <a href="/read/{{$runNews->slug}}" class="text-white">{{$runNews->title}}</a> <span class="dot"></span>
                                        @endforeach
                                    </marquee>
                                </div>
                            </div>

                            <div class="col-lg-2">
                                <div class="header-right f-right d-none d-md-none d-lg-block">
                                    <!-- Heder social -->
                                    <ul class="header-social">
                                        <li><a href="http://www.facebook.com/sharer.php?u={{url('/')}}&t=arahin.com" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="https://twitter.com/share?text=arahin.com&url={{url('/')}}" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="https://t.me/share/url?url={{url('/')}}" target="_blank"><i class="fab fa-telegram"></i></a></li>
                                        <li> <a href="https://api.whatsapp.com/send/?text={{url('/')}}" target="_blank"><i class="fab fa-whatsapp"></i></a></li>
                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="header-mid arahin-bg">
                <div class="container">
                    <div class="row d-flex align-items-center">
                        <!-- Logo -->
                        <div class="col-xl-3 col-lg-3 col-md-3 d-none d-md-block">
                            <div class="logo">
                                <a href="/"><img src="{{asset('storage')}}/img/web-arahin/page/logo-RB-L.png" width="170px" alt=""></a>
                            </div>
                        </div>
                        <div class="col-xl-9 col-lg-9 col-md-9">
                            <div class="header-banner f-right ">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-bottom header-sticky">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-xl-12 col-lg-12 col-md-12 header-flex">
                            <!-- sticky -->
                            <div class="sticky-logo">
                                <div class="row">
                                    <div class="col-sm-3 text-center">
                                        <a href="/"><img src="{{asset('storage')}}/img/web-arahin/page/logo-RB-L.png" width="150px" alt=""></a>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="d-flex justify-content-between align-items-center breaking-news">
                                            <marquee class="news-scroll " behavior="scroll" direction="left" onmouseover="this.stop();" onmouseout="this.start();">
                                                @foreach($runningNews as $runNews)
                                                <a href="/read/{{$runNews->slug}}" class="text-black">{{$runNews->title}}</a> <span class="dot"></span>
                                                @endforeach
                                            </marquee>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Main-menu -->
                            <div class="scroll-card scroll-z-depth">
                                <div class="scroll-tabs scroll-tabs-bg" scroll="true">
                                    <ul class="nav nav-tabs header-bottom-width" role="tablist">
                                        <li class="{{ Request::is('/') ? 'active' : ' ' }} ml-10"><a href="/" data-toogle="tab">Home</a></li>
                                        <li class="{{ Request::is('categories*') ? 'active' : ' ' }}"><a href="/categories" data-toogle="tab">Categories</a></li>
                                        <li class="{{ Request::is('books*') ? 'active' : ' ' }}"><a href="/books?searchBooks=books" data-toogle="tab">Book</a></li>
                                        <li class="{{ Request::is('latest') ? 'active' : ' ' }}"><a href="/latest" data-toogle="tab">Latest Post</a></li>
                                        <li class="{{ Request::is('about') ? 'active' : ' ' }}"><a href="/about" data-toogle="tab">About</a></li>
                                        <li class="{{ Request::is('contact') ? 'active' : ' ' }}"><a href="/contact" data-toogle="tab">Contact</a></li>
                                        <li class="{{ Request::is('search*') ? 'active' : ' ' }}"><a href="#" class="nav-search search-switch" data-toogle="tab"><i class="fa fa-search"></i></a></li>
                                        <li class="{{ Request::is('login*') ? 'active' : ' ' }} "><a href="/login" data-toogle="tab"><i class="fa fa-sign-in-alt"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">

            </div>
        </div>
        <!-- Header End -->
        <script type="text/javascript" language="javascript" src="{{asset('template')}}/js/tab-scrollable.js"></script>
</header>
