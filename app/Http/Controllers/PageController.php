<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Ads;
use App\Models\User;
use App\Models\UserSuggestion;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function about()
    {
        return view('reader/v-about', [
            "mostReader" => Post::where('status', 1)->with(['author', 'category'])->take(5)->orderBy('reader', 'desc')->get(),
            "runningNews" => Post::where('status', 1)->with(['author', 'category'])->latest()->take(5)->get(),
            "users" => User::with('role')->whereNotNull('email_verified_at')->get(),
            "bannerTop" => Ads::where('status', 1)->where('categoryads_id', 1)->get(),
            "footHome263" => Ads::where('status', 1)->where('categoryads_id', 5)->get()
        ]);
    }

    public function contact()
    {
        return view('reader/v-contact', [
            "mostReader" => Post::where('status', 1)->with(['author', 'category'])->take(5)->orderBy('reader', 'desc')->get(),
            "runningNews" => Post::where('status', 1)->with(['author', 'category'])->latest()->take(5)->get(),
            "bannerTop" => Ads::where('status', 1)->where('categoryads_id', 1)->get(),
            "footHome263" => Ads::where('status', 1)->where('categoryads_id', 5)->get(),
        ]);
    }

    public function sendMessage(Request $request)
    {
        $validatedData = $request->validate([
            'message' => 'required',
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required'
        ]);
        UserSuggestion::create($validatedData);
        return redirect('/contact')->with('success', 'Message has been sended !');
    }
}
