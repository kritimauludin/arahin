<?php

namespace App\Http\Controllers;

use App\Models\Ads;
use App\Models\Book;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {

        return view('v-dashboard', [
            'books' => count(Book::all()),
            'posts' => count(Post::all()),
            'authors' => count(User::where('role_id', 2)->get()),
            'ads' => count(Ads::where('status', 1)->get()),
            'users' => count(User::all())
        ]);
    }

    // public function instagram(Request $request)
    // {
    //     $res = getDetails('https://instagram.com/' . $request->username);
    //     return $res;
    // }
}
