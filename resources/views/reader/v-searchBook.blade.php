@extends('templates.userLayout')
@section('title', 'Search Page')
@section('content')

<main>
    <!-- About US Start -->
    <div class="about-area2 gray-bg pt-30 pb-30">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="whats-news-wrapper">
                        <!-- Heading & Nav Button -->
                        <div class="row">
                            <div class="section-tittle mb-15">
                                @if( $books->count())
                                <h3>Hasil Pencarian Buku </h3>
                                @else
                                <h3>Hasil Pencarian Buku Tidak ada</h3>
                                @endif
                            </div>
                        </div>
                        <!-- Tab content -->
                        <div class="row">
                            <div class="col-12">
                                <!-- Nav Card -->
                                <div class="tab-content" id="nav-tabContent">
                                    <!-- card one -->
                                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
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
                                </div>
                                <!-- End Nav Card -->
                            </div>
                        </div>
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
                                {{$books->links()}}
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
