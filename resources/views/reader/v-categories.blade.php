@extends('templates.userLayout')
@section('title', 'Categories - Arahin Media Kreasi')
@section('content')
@if(isset($categories[0]))
<main>
    <!-- Categories Start -->
    <div class="about-area2 gray-bg pt-60 pb-60">
        <div class="container">
            <div class="col-lg-12">
                <div class="row">
                    @foreach($categories as $category)
                    <a href="/categories/{{$category->slug}}">
                        <div class="col-lg-3 mb-2">
                            <div id="card">
                                <div id="content-category">
                                    <p class="text-center">
                                        <span>{{$category->name}}</span><a href="/categories/{{$category->slug}}">ReadMore</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!--Start pagination -->
    <div class="pagination-area  gray-bg pb-45">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="single-wrap">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-start">
                                {{$categories->links()}}
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End pagination  -->
</main>

<script type="text/javascript" src="{{asset('template')}}/js/vanilla-tilt.js"></script>
<script type="text/javascript">
    VanillaTilt.init(document.querySelector("#card"), {
        max: 25,
        speed: 400
    });

    //It also supports NodeList
    VanillaTilt.init(document.querySelectorAll("#card"));
</script>
@else
    Nothing New In Arahin
@endif

@endsection
