<?php

namespace App\Http\Controllers;

use App\Models\BookChapter;
use App\Models\Book;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookChapterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return abort(403, 'Anda tidak punya akses kehalaman ini');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $book = Book::where('slug', $request->book)->get();
        $chapter = count(BookChapter::where('book_id', $book[0]->id)->get());
        return view('author-book.v-newChapter', [
            'book' => $book,
            'chapter' => $chapter + 1
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
        $validatedData = $request->validate([
            'title_chapter' => 'required|max:255',
            'slug' => 'required|unique:posts',
            'body' => 'required',
            'chapter' => 'required',
            'book_id' => 'required',
            'img_chapter' => 'required|image|file',
        ]);
        if ($request->img_chapter) {
            $validatedData['img_chapter'] = $request->img_chapter->store('img/cover-chapter');
        }

        activity()->log('Created new chapter book');
        BookChapter::create($validatedData);

        return redirect('/mybook/books')->with('success', 'New book chapter has been added !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BookChapter  $chapter
     * @return \Illuminate\Http\Response
     */
    public function show(BookChapter $chapter)
    {
        return view('author-book.v-showChapter', [
            'chapter' => $chapter,
            'book' => Book::where('id', $chapter->book_id)->get()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BookChapter  $chapter
     * @return \Illuminate\Http\Response
     */
    public function edit(BookChapter $chapter)
    {
        return view('author-book.v-editChapter', [
            'chapter' => $chapter,
            'book' => Book::where('id', $chapter->book_id)->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BookChapter  $chapter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BookChapter $chapter)
    {
        //
        $validatedData = $request->validate([
            'title_chapter' => 'required|max:255',
            'slug' => 'required|unique:posts',
            'body' => 'required',
            'img_chapter' => 'image|file',
        ]);
        if ($request->img_chapter) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['img_chapter'] = $request->img_chapter->store('img/cover-chapter');
        }

        BookChapter::where('id', $chapter->id)
            ->update($validatedData);

        activity()->log('Edit a chapter book');
        return redirect('/mybook/chapters/' . $validatedData['slug'])->with('success', 'Chapter has been edited !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BookChapter  $chapter
     * @return \Illuminate\Http\Response
     */
    public function destroy(BookChapter $chapter)
    {
        if ($chapter->img_chapter) {
            Storage::delete($chapter->img_chapter);
        }
        BookChapter::destroy($chapter->id);

        activity()->log('Deleted a chapter with title ' . $chapter->title_chapter);
        return redirect('/mybook/books')->with('success', 'A chapter has been deleted!!');
    }
    public function createSlug(Request $request)
    {
        $slug =  SlugService::createSlug(BookChapter::class, 'slug', $request->title_chapter);
        return response()->json(['slug' => $slug]);
    }
}
