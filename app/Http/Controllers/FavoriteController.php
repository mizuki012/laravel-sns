<?php

namespace App\Http\Controllers;

use App\Models\Post;

class FavoriteController extends Controller
{
    public function store(Post $post)
    {
        auth()->user()->favorite($post->id);

        return back();
    }

    public function destroy(Post $post)
    {
        auth()->user()->unfavorite($post->id);

        return back();
    }
}