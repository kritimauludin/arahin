<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\ActivityLog;
use App\Models\UserData;
use App\Models\Book;
use App\Models\Post;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

class UserDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (UserData::where('user_id', auth()->user()->id)->first() == null) {
            $userData['user_id'] = auth()->user()->id;
            UserData::create($userData);
        }
        $requestUserData = User::where('id', auth()->user()->id)->with('user_data', 'role')->get();

        return view('user.v-home', [
            'activity_log' => ActivityLog::where('causer_id', auth()->user()->id)->with('user')->limit(10)->orderBy('id', 'DESC')->get(),
            'user' => $requestUserData[0],

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('user.v-showUser', [
            'user' => $user,
            'roles' => Role::all(),
            "books" => count(Book::where('author_id', $user->id)->get()),
            "posts" => count(Post::where('author_id', $user->id)->get()),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('user.v-editProfile', [
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $importantData = [
            'name' => 'required|max:255',
            'username' => 'required',
        ];
        $optionalData = [
            'address' => 'max:255',
            'about_yourself' => 'max:255',
            'img_profile' => 'image|file|max:2024',
            'phone_number' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'hobby' => 'max:255',
            'website' => 'max:255',
            'github' => 'max:255',
            'twitter' => 'max:255',
            'instagram' => 'max:255',
            'facebook' => 'max:255',
        ];
        if ($request->username != $user->username) {
            $importantData['username'] = 'required|unique:users';
        }

        $validatedImportantData = $request->validate($importantData);
        $validatedOptionalData = $request->validate($optionalData);

        if ($request->img_profile) {
            if ($request->oldImage && $request->oldImage != 'img/user-profile/default.svg') {
                Storage::delete($request->oldImage);
            }
            $validatedOptionalData['img_profile'] = $request->file('img_profile')->store('img/user-profile');
        }

        User::where('id', $user->id)->update($validatedImportantData);
        UserData::where('user_id', $user->id)->update($validatedOptionalData);

        activity()->log('Edited Your Profile ');
        return redirect('/user')->with('success', 'Profile has been edited!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        User::destroy($user->id);
        Post::where('author_id', $user->id)->delete();
        Book::where('author_id', $user->id)->delete();
        return redirect('/founder/user/alluser')->with('success', 'User has been deleted!!');
    }

    public function changePassword(Request $request)
    {
        $user = Auth::user();
        $userPassword = $user->password;

        if (!Hash::check($request->old_password, $userPassword)) {
            return back()->withErrors(['old_password' => 'password not match']);
        };

        $request->validate([
            'old_password' => 'required',
            'password' => 'required|same:confirm_password|min:6',
            'confirm_password' => 'required'
        ]);

        $validatedData['password'] = Hash::make($request['password']);

        User::where('id', $user->id)->update($validatedData);
        activity()->log('Change Password');
        return redirect()->back()->with('success', 'password successfully updated');
    }
    public function changeRole(User $user, Request $request)
    {
        $validatedData = $request->validate([
            'role_id' => 'required',
        ]);
        User::where('id', $user->id)->update($validatedData);
        activity()->log('Change Role ' . $user->name);
        return redirect()->back()->with('success', 'This role user has been updated');
    }
}
