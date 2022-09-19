@extends('templates.userLayout')
@section('title', 'Books Page - Arahin Media Kreasi')
@section('content')
@if(isset($books[0]))
<main>
    <div class="container">
        <!--image row start-->
        <div class="row">
            @foreach($books as $book)
            <!--image card start-->
            <div class="image-category col-lg-3">
                <img src="{{asset('storage/'.$book->img_cover_book)}}" width="100%" alt="">
                <div class="details">
                    <span>{{$book->category->name}}</span>
                    <h2>{{$book->title_book}}</h2>
                    <p>{{$book->excerpt_book}}</p>
                    <div class="more">
                        <a href="/books/{{$book->slug}}?searchBooks=books" class="read-more">ReadMore</a>
                        <div class="icon-links">
                            <a href="#" onclick="return alert('This feature is under development!');"><i class="fas fa-heart"></i></a>
                            <a href="#" onclick="return alert('This feature is under development!');"><i class="fas fa-eye"></i></a>
                            <a href="#" onclick="return alert('This feature is under development!');"><i class="fas fa-paperclip"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</main>

@else
<h1 class="m-5">Nothing New In Arahin</h1>
@endif
@endsection
