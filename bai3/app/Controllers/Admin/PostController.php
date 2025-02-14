<?php

namespace App\Controllers\Admin;

use App\Models\Category;
use App\Models\Post;

class PostController
{
    public function index()
    {
        $posts = Post::select(['posts.*', 'name'])
            ->join('categories', 'category_id', 'id')
            ->get();
        return view('admin.posts.index', compact('posts'));
    }

    public function add()
    {
        $categories = Category::all();
        return view('admin.posts.add', compact('categories'));
    }
}
