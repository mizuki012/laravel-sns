<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $posts = Post::with('user')
            ->latest()
            ->paginate(10);

        return view('posts.index', [
            'posts' => $posts,
        ]);
    }

    public function show(User $user)
    {
        $posts = $user->posts()
            ->with('user')
            ->latest()
            ->paginate(10);

        return view('users.show', [
            'user' => $user,
            'posts' => $posts,
        ]);
    }

    public function followings(User $user)
    {
        $users = $user->followings()
            ->paginate(10);

        return view('users.followings', [
            'user' => $user,
            'users' => $users,
        ]);
    }

    public function followers(User $user)
    {
        $users = $user->followers()
            ->paginate(10);

        return view('users.followers', [
            'user' => $user,
            'users' => $users,
        ]);
    }
}