<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class SitemapController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->get();

        return response()->view('sitemap.index', compact('posts'))
            ->header('Content-Type', 'text/xml');
    }
}
