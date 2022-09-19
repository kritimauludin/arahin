<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\Ads;
use App\Models\Book;
use App\Models\BookChapter;

class BookController extends Controller
{
    public function index()
    {
        return view('reader.v-book', [
            'books' => Book::where('status', 1)->with(['category'])->latest()->paginate(10),
            "runningNews" => Post::where('status', 1)->with(['author', 'category'])->latest()->take(5)->get(),
            "mostReader" => Post::where('status', 1)->with(['author', 'category'])->take(5)->orderBy('reader', 'desc')->get(),
            "bannerTop" => Ads::where('status', 1)->where('categoryads_id', 1)->get(),
            "footHome263" => Ads::where('status', 1)->where('categoryads_id', 5)->get(),
        ]);
    }

    public function allChapter(Book $book)
    {
        return view('reader.v-allChapters', [
            'book' => $book,
            "runningNews" => Post::where('status', 1)->with(['author', 'category'])->latest()->take(5)->get(),
            'chapters' => $book->book_chapters()->paginate(10),
            "mostReader" => Post::where('status', 1)->with(['author', 'category'])->take(5)->orderBy('reader', 'desc')->get(),
            "bannerTop" => Ads::where('status', 1)->where('categoryads_id', 1)->get(),
            "footHome263" => Ads::where('status', 1)->where('categoryads_id', 5)->get()
        ]);
    }
    public function readChapter(BookChapter $bookchapter)
    {

        
        $bookId = $bookchapter->book_id;
        $chapter = $bookchapter->chapter;

        $lastChapter = count(BookChapter::where('book_id', $bookId)->get());

        if($chapter != 1){
            $previousChapter = BookChapter::select('slug')->where('book_id', $bookId)->where('chapter', $chapter - 1)->first();
        }else {
            $previousChapter = false;
        }
        if($chapter != $lastChapter){
            $nextChapter = BookChapter::select('slug')->where('book_id', $bookId)->where('chapter', $chapter + 1)->first();
        }else {
            $nextChapter = false;
        }
        
        $data['reader'] = $bookchapter->reader + 1;
        BookChapter::where('id', $bookchapter->id)->update($data);
        // dd($lastChapter);
        return view('reader.v-readChapter', [
            'bookchapter' => $bookchapter,
            'nextChapter' => $nextChapter,
            'previousChapter' => $previousChapter,
            "runningNews" => Post::where('status', 1)->with(['author', 'category'])->latest()->take(5)->get(),
            "mostReader" => Post::where('status', 1)->with(['author', 'category'])->take(5)->orderBy('reader', 'desc')->get(),
            "bannerAds" => Ads::where('status', 1)->where('categoryads_id', 6)->get(),
        ]);
    }
}
