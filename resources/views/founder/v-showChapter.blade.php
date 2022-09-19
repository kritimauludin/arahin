@extends('templates.adminLayout')

@section('title', '[Blog Post - Read Chapter]')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Trending Tittle -->
    <div class="card-shadow mb-5">
        <div class="col-lg-7">
            <div class="about-img" style="max-height: 350px; overflow:hidden;">
                <img src="{{asset('storage/'.$chapter->img_chapter)}}" height="500px" alt="">
            </div>
            <div class="row mt-3 ml-2">
                <a href="/founder/post/book/show/{{$book[0]->slug}}" class="btn btn-success mr-2"><i class="fas fa-fw fa-arrow-left"></i> Back to all chapter book</a>
            </div>
            <div class="mb-10 pt-20">

            </div>
            <div class="heading-news mb-30 pt-30">
                <h3>{{ $chapter->title_chapter}}</h3>
                <h6>- {{ $chapter->created_at }}</h6>
            </div>
            <div class="about-prea">
                {!! $chapter->body !!}
            </div>
        </div>
    </div>
</div>
@endsection