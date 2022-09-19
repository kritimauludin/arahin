<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use App\Models\Book;
use App\Models\BookChapter;
use App\Models\Category;
use App\Models\User;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FounderController extends Controller
{
    public function allAuthor()
    {
        return view('founder.v-allAuthor', [
            'authors' => User::where('role_id', 2)->get()
        ]);
    }
    public function allUser()
    {
        return view('founder.v-allUser', [
            'users' => User::with('role')->get()
        ]);
    }
    public function recruit(User $user)
    {
        // dd($user);
        $data['role_id'] = 2; //penulis arahin
        User::where('id', $user->id)->update($data);
        activity()->log('Rekrut username' . $user->name);
        return redirect('/founder/user/alluser')->with('success', $user->name . ' has become a author in Arahin!!');
    }

    public function allPost()
    {
        return view('founder.v-allPost', [
            'posts' => Post::with(['author', 'category'])->get()
        ]);
    }
    public function publishPost(Post $post)
    {
        $data['status'] = 1; //status publish arahin
        Post::where('id', $post->id)->update($data);
        return redirect('/founder/post/all')->with('success', 'Post has been published !!');
    }
    public function deletePost(Post $post)
    {
        if ($post->image && $post->image != 'img/post-image/trending_top2.jpg') {
            Storage::delete($post->image);
        }
        Post::destroy($post->id);
        activity()->log('Deleted a post with title ' . $post->title);

        return redirect('/founder/post/all')->with('success', 'Post has been deleted!!');
    }

    public function allBook()
    {
        $books = Book::with(['category', 'book_chapters'])->get();
        $reader[0] = 0;
        for ($i = 0; $i < count($books); $i++) {
            $reader[$i] = 0;
            for ($j = 0; $j < count($books[$i]->book_chapters); $j++) {
                $reader[$i] = $books[$i]->book_chapters[$j]->reader + $reader[$i];
            }
        }
        return view('founder.v-allBook', [
            'books' => $books,
            'readers' => $reader
        ]);
    }
    public function publishBook(Book $book)
    {
        $data['status'] = 1; //status publish arahin
        Book::where('id', $book->id)->update($data);
        return redirect('/founder/post/book/all')->with('success', 'Book has been published !!');
    }
    public function deleteBook(Book $book)
    {
        if ($book->img_cover_book) {
            Storage::delete($book->img_cover_book);
        }
        Book::destroy($book->id);
        BookChapter::where('book_id', $book->id)->delete();
        activity()->log('Deleted a Book with title ' . $book->title_book);

        return redirect('/founder/post/book/all')->with('success', 'Book has been deleted!!');
    }
    public function showBook(Book $book)
    {
        return view('founder.v-showBook', [
            'book' => $book,
            'chapters' => BookChapter::where('book_id', $book->id)->paginate(10)
        ]);
    }
    public function showChapter(BookChapter $bookchapter)
    {
        return view('founder.v-showChapter', [
            'chapter' => $bookchapter,
            'book' => Book::where('id', $bookchapter->book_id)->get()
        ]);
    }

    public function readPost(Post $post)
    {
        return view('founder.v-readpost', [
            'post' => $post
        ]);
    }

    public function allCategory()
    {
        return view('founder.v-allCategory', [
            'categories' => Category::all()
        ]);
    }
    public function activateCategory(Category $category)
    {
        $data['status'] = 1; //status category arahin
        Category::where('id', $category->id)->update($data);
        return redirect('/founder/post/allcategory')->with('success', 'Category has been activate !!');
    }
}
