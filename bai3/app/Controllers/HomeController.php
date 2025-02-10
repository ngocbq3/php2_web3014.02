<?php

namespace App\Controllers;

use App\Models\Category;
use App\Models\Post;

class HomeController
{
    public function index()
    {
        $categories = Category::all();
        var_dump($categories);
        return view('home');
    }

    public function test()
    {
        $data = [
            'title' => 'Update Test 1',
            'description' => "mô tả 1",
            'content' => "nội dung 1",
            'image' => 'anh.jpg',
            'category_id' => 1
        ];
        // return Post::create($data);

        return Post::update($data, 2);
    }
}
