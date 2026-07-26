<?php

namespace App\Http\Controllers;

use App\Models\User;

class FollowController extends Controller
{
    public function store(User $user)
    {
        auth()->user()->follow($user->id);

        return back();
    }

    public function destroy(User $user)
    {
        auth()->user()->unfollow($user->id);

        return back();
    }
}