@extends('templates.adminLayout')

@section('title', '[Blog Post - Home]')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Trending Tittle -->
    <div class="card-shadow mb-5">
        <div class="col-lg-7">
            <div class="about-img">
                <img src="{{asset('storage/'.$post->image)}}" height="500px" alt="">
            </div>
            <div class="row mt-3 ml-2">
                <a href="/founder/post/all" class="btn btn-success mr-2"><i class="fas fa-fw fa-arrow-left"></i> Back to all post</a>
            </div>
            <div class="mb-10 pt-20">

            </div>
            <div class="heading-news mb-30 pt-30">
                <h3>{{ $post->title }}</h3>
                <h6>- {{ $post->published_at }}</h6>
            </div>
            <div class="about-prea">
                {!! $post->body !!}
            </div>
        </div>
    </div>
</div>
@endsection