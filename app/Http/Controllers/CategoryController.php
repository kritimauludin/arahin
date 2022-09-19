<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Ads;

class CategoryController extends Controller
{
    public function index()
    {
        return view('reader/v-categories', [
            "categories" => Category::where('status', 1)->where('category_for', 'post')->paginate(12),
            "runningNews" => Post::where('status', 1)->with(['author', 'category'])->latest()->take(5)->get(),
            "mostReader" => Post::where('status', 1)->with(['author', 'category'])->take(5)->orderBy('reader', 'desc')->get(),
            "bannerTop" => Ads::where('status', 1)->where('categoryads_id', 1)->get(),
            "footHome263" => Ads::where('status', 1)->where('categoryads_id', 5)->get(),
        ]);
    }
    public function allpost(Category $category)
    {
        return view('reader/v-category', [
            "posts" => Post::with(['author', 'category'])->where('category_id', $category->id)->paginate(6),
            "runningNews" => Post::where('status', 1)->with(['author', 'category'])->latest()->take(5)->get(),
            "category" => $category,
            "mostReader" => Post::where('status', 1)->with(['author', 'category'])->take(5)->orderBy('reader', 'desc')->get(),
            "bannerTop" => Ads::where('status', 1)->where('categoryads_id', 1)->get(),
            "footHome263" => Ads::where('status', 1)->where('categoryads_id', 5)->get()
        ]);
    }
}
