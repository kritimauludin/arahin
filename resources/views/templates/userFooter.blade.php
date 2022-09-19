<footer>
    <!-- Footer Start-->
    <div class="footer-main footer-bg">
        <div class="footer-area footer-padding">
            <div class="container">
                <div class="row d-flex justify-content-between">
                    <div class="col-xl-3 col-lg-3 col-md-5 col-sm-8">
                        <div class="single-footer-caption mb-50">
                            <div class="single-footer-caption mb-30">
                                <!-- logo -->
                                <div class="footer-logo">
                                    <a href="/"><img src="{{asset('storage')}}/img/web-arahin/page/logo-RW-P.png" width="200px" alt=""></a>
                                </div>
                                <div class="footer-tittle">
                                    <div class="footer-pera">
                                        <p class="info1">Media informasi anak bangsa, Lewat media ini kita bisa sharing tugas, membaca buku, dan memperluas wawasan.</p>
                                        <p class="info2">Kota Bogor, Indonesia.</p>
                                        <p class="info2">Phone: +62 (0) 857 1876 3119</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-5 col-sm-7">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>Popular post</h4>
                            </div>
                            @foreach($mostReader as $mostRead)
                            <!-- Popular post -->
                            <div class="whats-right-single mb-20">
                                <div class="whats-right-img">
                                    <img src="{{asset('storage/'. $mostRead->image)}}" width="100px" alt="">
                                </div>
                                <div class="whats-right-cap">
                                    <h4><a href="/read/{{$mostRead->slug}}">{{$mostRead->title}}</a></h4>
                                    <p>{{$mostRead->author->name}} | {{Carbon\Carbon::parse($mostRead->published_at)->diffForHumans()}}</p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-5 col-sm-7">
                        <div class="single-footer-caption mb-50">
                            <div class="banner">
				<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-7326678056847065" crossorigin="anonymous"></script>
				<!-- latest-read-vertical -->
				<ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-7326678056847065" data-ad-slot="8433413851" data-ad-format="auto" data-full-width-responsive="true"></ins>
				<script>(adsbygoogle = window.adsbygoogle || []).push({});</script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
		<script async src="https://cse.google.com/cse.js?cx=a48444bc764f2652a"></script>
		<div class="gcse-search"></div>
        </div>
        <!-- footer-bottom aera -->
        <div class="footer-bottom-area footer-bg">
            <div class="container">
                <div class="footer-border">
                    <div class="row d-flex align-items-center">
                        <div class="col-xl-12 ">
                            <div class="footer-copy-right text-center">
                                <p>
                                    Copyright &copy;<script>
                                        document.write(new Date().getFullYear());
                                    </script> All rights reserved
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End-->
</footer>
<!-- Search model Begin -->
<div class="search-model-box">
    <div class="d-flex align-items-center h-100 justify-content-center">
        <div class="search-close-btn">+</div>
        <form action="/search" class="search-model-form">
            <input type="text" id="search" name="search" placeholder="Searching {{ isset($_GET['searchBooks']) ? 'Books' : 'Posts' }}.....">
            @if(isset($_GET['searchBooks']))
            <input type="hidden" id="searchBooks" name="searchBooks" value="{{$_GET['searchBooks']}}">
            @endif
        </form>
    </div>
</div>
<!-- Search model end -->

<!-- JS here -->
<script>
    (function newCaption() {
        var captions = [
            'Teknologi, Cerita, Sharing Tugas',
            'Semua Bisa Menjadi Penulis',
            'Semua Bisa Berbagi'
        ];
        var randomCapt = Math.floor(Math.random() * captions.length);
        document.getElementById('captDisplay').innerHTML = captions[randomCapt];
    })();
</script>

<!-- Jquery, Popper, Bootstrap -->
<script src="{{asset('template')}}/js/vendor/jquery-1.12.4.min.js"></script>
<script src="{{asset('template')}}/js/bootstrap.min.js"></script>

<!-- Jquery Slick , Owl-Carousel Plugins -->
<script src="{{asset('template')}}/js/slick.min.js"></script>
<!-- Date Picker -->
<script src="{{asset('template')}}/js/gijgo.min.js"></script>
<!-- One Page, Animated-HeadLin -->
<script src="{{asset('template')}}/js/wow.min.js"></script>

<!-- Scrollup, nice-select, sticky -->
<script src="{{asset('template')}}/js/jquery.scrollUp.min.js"></script>

<!-- Jquery Plugins, main Jquery -->
<script src="{{asset('template')}}/js/plugins.js"></script>
<script src="{{asset('template')}}/js/main.js"></script>
