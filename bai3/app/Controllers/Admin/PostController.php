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

        //Validate
        if (trim($data['title']) == '') {
            $errors['title'] = "Bạn chưa nhập tiêu đề";
        }
        if (trim($data['description']) == '') {
            $errors['description'] = "Bạn chưa nhập mô tả";
        } else if (strlen($data['description']) < 8) {
            $errors['description'] = "Yêu mô tả phải ít nhất 8 ký tự";
        }
        $image = ""; //Trường hợp người dùng không nhập ảnh
        //Xử lý hình ảnh
        $file = $_FILES['image'];
        //Dinh dạng ảnh được phép
        $imgs = ['jpg', 'jpeg', 'png', 'gif'];
        //Lấy ra phần mở rộng của hình ảnh
        $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
        if ($file['size'] == 0) {
            $errors['image'] = "Bạn cần nhập ảnh";
        } else if (!in_array($ext, $imgs)) {
            $errors['image'] = "File của bạn không đúng định dạng";
        }

        //trường hợp có các lỗi validate
        if (isset($errors)) {
            $categories = Category::all();
            return view('admin.posts.add', compact('categories', 'errors', 'data'));
        }
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

    public function update($id)
    {
        $data = $_POST;

        //Xử lý hình ảnh
        $file = $_FILES['image'];
        if ($file['size'] > 0) {
            $image = "images/" . $file['name'];
            move_uploaded_file($file['tmp_name'], $image);
            //Thêm ảnh vào data
            $data['image'] = $image;
        }

        //cập nhật
        Post::update($data, $id);
        return redirect('admin/posts/edit/' . $id);
    }
}
