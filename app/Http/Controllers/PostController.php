<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\View\View;

class PostController extends Controller
{
    /**
     * shows a list of posts
     *
     * @return View
     */
    public function index(): View
    {
        $posts = Post::all();

        return view('blog.index', ['posts' => $posts]);
    }

    /**
     * shows on post
     *
     * @param string $slug
     * @return View
     */
    public function view(string $slug): View
    {
        $post = Post::where('slug', $slug)->first();
        return view('blog.post', ['post' => $post]);
    }
}
