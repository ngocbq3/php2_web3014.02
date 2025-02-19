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

    public function store()
    {
        $data = $_POST;

        $image = ""; //Trường hợp người dùng không nhập ảnh
        //Xử lý hình ảnh
        $file = $_FILES['image'];
        if ($file['size'] > 0) {
            $image = "images/" . $file['name'];
            move_uploaded_file($file['tmp_name'], $image);
        }
        //Đưa thuộc tính image và data
        $data['image'] = $image;

        Post::create($data);
        return redirect('admin/posts');
    }

    public function destroy($id)
    {
        Post::delete($id);
        return redirect('admin/posts');
    }

    public function edit($id)
    {
        $post = Post::find($id);
        $categories = Category::all();
        return view('admin.posts.edit', compact('post', 'categories'));
    }
}
