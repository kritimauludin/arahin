<?php

namespace App\Http\Controllers;

use App\Models\UserSuggestion;
use Illuminate\Http\Request;

class PublicRelationController extends Controller
{
    public function index()
    {
        return view('public-relation.v-userSuggestions', [
            'userSuggestions' => UserSuggestion::all()
        ]);
    }
    public function showUserSuggestion(UserSuggestion $userSuggestion)
    {
        return view('public-relation.v-showUserSuggestion', [
            'userSuggestion' => $userSuggestion
        ]);
    }
    public function deleteUserSuggestion(UserSuggestion $userSuggestion)
    {
        UserSuggestion::destroy($userSuggestion->id);
        activity()->log('Deleted a user suggestion');

        return redirect('relation/usersuggestions')->with('success', 'User Suggestion has been deleted!!');
    }
}
