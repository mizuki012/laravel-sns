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
}