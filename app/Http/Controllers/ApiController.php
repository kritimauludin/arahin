<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    //

    public function trending()
    {
        return response()->json(Post::where('status', 1)->where('category_id', 2)->with(['author', 'category'])->latest()->take(10)->get());
    }

public function newPost()
    {
        return response()->json(Post::where('status', 1)->with(['author', 'category'])->latest()->take(10)->get());
    }
}
