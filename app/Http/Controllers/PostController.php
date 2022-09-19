<?php

namespace App\Http\Controllers;

use App\Models\Ads;
use App\Models\Book;
use App\Models\Category;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function getDataFollowers()
    {
        $username = 'ocumps.eco';
        $response = file_get_contents("https://www.instagram.com/".$username."/?__a=1");
        if ($response !== false) {
            $data = json_decode($response, true);
            if ($data !== null) {
                $instagramFollowers = $data['graphql']['user']['edge_followed_by']['count'];
            }else{
		$instagramFollowers = 0;
	    }
        }
        $data = [
            "instagramFollowers" => $instagramFollowers,
        ];
        return $data;
    }
    public function index()
    {
//        $followers = $this->getDataFollowers();
	$followers = ["instagramFollowers" => 0];
        $category = Category::where('status', 1)->where('category_for', 'post')->take(5)->get();
        $limit = count($category);
        $postCategory = [];
        for ($i = 0; $i < $limit; $i++) {
            array_push($postCategory, Post::where('status', 1)->where('category_id', $category[$i]->id)->with(['author', 'category'])->latest()->take(8)->get());
        }

        return view('reader/v-index', [
            "headline" => Post::where('status', 1)->where('category_id', 1)->with(['author', 'category'])->latest()->take(10)->get(),
            "trending" => Post::where('status', 1)->where('category_id', 2)->with(['author', 'category'])->latest()->take(10)->get(),
            "posts" => Post::where('status', 1)->with(['author', 'category'])->latest()->take(10)->get(),
            "mostReader" => Post::where('status', 1)->with(['author', 'category'])->take(5)->orderBy('reader', 'desc')->get(),
            "runningNews" => Post::where('status', 1)->with(['author', 'category'])->latest()->take(10)->get(),
            "categories" => $category,
            "postCategory" => $postCategory,
            "followers" => $followers,
            "bannerTop" => Ads::where('status', 1)->where('categoryads_id', 1)->get(),
            "bannerMid" => Ads::where('status', 1)->where('categoryads_id', 2)->get(),
            "bannerFoot" => Ads::where('status', 1)->where('categoryads_id', 3)->get(),
            "leftHome263" => Ads::where('status', 1)->where('categoryads_id', 4)->get(),
            "footHome263" => Ads::where('status', 1)->where('categoryads_id', 5)->get()
        ]);
    }

    public function latestNews()
    {
        $posts = Post::where('status', 1)->with(['author'])->latest()->take(1)->get();
            $post = $posts[0];
            $books =  count(Book::where('author_id', $posts[0]->author->id)->get());
            $posts = count(Post::where('author_id', $posts[0]->author->id)->get());
        return view('reader/v-latest', [
            'post' => $post,
            "books" => $books,
            "posts" => $posts,
            "runningNews" => Post::where('status', 1)->with(['author', 'category'])->latest()->take(5)->get(),
            "mostReader" => Post::where('status', 1)->with(['author', 'category'])->take(5)->orderBy('reader', 'desc')->get(),
            "bannerTop" => Ads::where('status', 1)->where('categoryads_id', 1)->get(),
            "footHome263" => Ads::where('status', 1)->where('categoryads_id', 5)->get(),
            "bannerAds" => Ads::where('status', 1)->where('categoryads_id', 6)->get()
        ]);
    }

    public function search()
    {
        // dd(request());
        if (request(['searchBooks'])) {
            return view('reader/v-searchBook', [
                "books" => Book::with(['category'])->latest()->filter(request(['search']))->paginate(6)->withQueryString(),
                "runningNews" => Post::where('status', 1)->with(['author', 'category'])->latest()->take(5)->get(),
                "mostReader" => Post::where('status', 1)->with(['author', 'category'])->take(5)->orderBy('reader', 'desc')->get(),
                "bannerTop" => Ads::where('status', 1)->where('categoryads_id', 1)->get(),
                "footHome263" => Ads::where('status', 1)->where('categoryads_id', 5)->get(),
            ]);
        } else {
            return view('reader/v-searchPost', [
                "posts" => Post::with(['category'])->latest()->filter(request(['search']))->paginate(6)->withQueryString(),
                "runningNews" => Post::where('status', 1)->with(['author', 'category'])->latest()->take(5)->get(),
                "mostReader" => Post::where('status', 1)->with(['author', 'category'])->take(5)->orderBy('reader', 'desc')->get(),
                "bannerTop" => Ads::where('status', 1)->where('categoryads_id', 1)->get(),
                "footHome263" => Ads::where('status', 1)->where('categoryads_id', 5)->get(),
            ]);
        }
    }

    public function read(Post $post)
    {
        $data['reader'] = $post->reader + 1;
        Post::where('id', $post->id)->update($data);

        return view('reader/v-read', [
            "post" => $post,
            "runningNews" => Post::where('status', 1)->with(['author', 'category'])->latest()->take(5)->get(),
            "mostReader" => Post::where('status', 1)->with(['author', 'category'])->take(5)->orderBy('reader', 'desc')->get(),
            "bannerAds" => Ads::where('status', 1)->where('categoryads_id', 6)->get(),
            "books" => count(Book::where('author_id', $post->author->id)->get()),
            "posts" => count(Post::where('author_id', $post->author->id)->get()),
        ]);
    }
}
