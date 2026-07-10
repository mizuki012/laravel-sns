<?php

namespace App\Http\Controllers;

use App\Models\Post;

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
}