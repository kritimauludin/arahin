<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookChapter;
use App\Models\Category;
use Illuminate\Http\Request;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class MyBookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::with(['category', 'book_chapters'])->where('author_id', auth()->user()->id)->get();
        $reader[0] = 0;
        for ($i = 0; $i < count($books); $i++) {
            $reader[$i] = 0;
            for ($j = 0; $j < count($books[$i]->book_chapters); $j++) {
                $reader[$i] = $books[$i]->book_chapters[$j]->reader + $reader[$i];
            }
        }
        return view('author-book.v-myBook', [
            'books' => $books,
            'readers' => $reader
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('author-book.v-createBook', [
            'categories' => Category::where('status', 1)->where('category_for', 'book')->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $validatedData = $request->validate([
            'title_book' => 'required|max:255',
            'slug' => 'required|unique:posts',
            'category_id' => 'required',
            'img_cover_book' => 'required|image|file',
        ]);
        if ($request->img_cover_book) {
            $validatedData['img_cover_book'] = $request->img_cover_book->store('img/cover-book');
        }
        if (auth()->user()->role_id == 5) {
            $validatedData['status'] = 0;
        }
        $validatedData['author_id'] = auth()->user()->id;
        $validatedData['excerpt_book'] = Str::limit(strip_tags($request->excerpt_book), 200, '...');

        activity()->log('Created new title book');
        Book::create($validatedData);

        return redirect('/mybook/books')->with('success', 'New book title has been added !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return view('author-book.v-showBook', [
            'book' => $book,
            'chapters' => BookChapter::where('book_id', $book->id)->paginate(10)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        return view('author-book.v-editBook', [
            'book' => $book,
            'categories' => Category::where('status', 1)->where('category_for', 'book')->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $rules = [
            'title_book' => 'required|max:255',
            'slug' => 'required|unique:posts',
            'category_id' => 'required',
            'img_cover_book' => 'image|file',
        ];
        if ($request->slug != $book->slug) {
            $rules['slug'] = 'required|unique:posts';
        }

        $validatedData = $request->validate($rules);

        if ($request->img_cover_book) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['img_cover_book'] = $request->img_cover_book->store('img/cover-book');
        }
        $validatedData['author_id'] = auth()->user()->id;
        $validatedData['excerpt_book'] = Str::limit(strip_tags($request->excerpt_book), 200, '...');

        Book::where('id', $book->id)
            ->update($validatedData);
        activity()->log('Edited a book with title ' . $book->title);

        return redirect('/mybook/books')->with('success', 'Book has been edited !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        if ($book->img_cover_book) {
            Storage::delete($book->img_cover_book);
        }
        Book::destroy($book->id);
        BookChapter::where('book_id', $book->id)->delete();
        activity()->log('Deleted a book with title ' . $book->title_book);
        return redirect('/mybook/books')->with('success', 'Book has been deleted!!');
    }
    public function createSlug(Request $request)
    {
        $slug =  SlugService::createSlug(Book::class, 'slug', $request->title_book);
        return response()->json(['slug' => $slug]);
    }
}
