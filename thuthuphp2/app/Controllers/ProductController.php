<?php

namespace App\Controllers;

use App\Models\Category;
use App\Models\Product;

class ProductController
{
    public function index()
    {
        $products = Product::select(['products.*', 'categories.name as cate_name'])
            ->join('categories', 'categories.id', 'products.category_id')
            ->orderBy('id', 'DESC')
            ->get();
        return view('index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('create', compact('categories'));
    }

    public function store()
    {
        $data = $_POST;

        //Validate
        if (empty($data['name'])) {
            $errors['name'] = "Bạn chưa nhập name";
        } elseif (strlen(trim($data['name'])) < 5) {
            $errors['name'] = "Name phải ít nhất 5 ký tự";
        }

        if (empty($data['description'])) {
            $errors['description'] = "Bạn chưa nhập description";
        }

        //Xử lý ảnh
        $file = $_FILES['img_thumbnail'];

        //Validate ảnh
        $imgs = ['jpg', 'jpeg', 'png', 'gif']; //các ảnh được phép
        if ($file['size'] > 0) {
            $image = "images/" . $file['name'];
            //Lấy ra thông tin phần mở rộng của file
            $ext = pathinfo($image, PATHINFO_EXTENSION);

            if (!in_array($ext, $imgs)) {
                $errors['img_thumbnail'] = "Ảnh không đúng định dạng";
            }
        }

        //Nếu có lỗi validate
        if (isset($errors)) {
            $categories = Category::all();
            return view('create', compact('categories', 'errors', 'data'));
        }

        if ($file['size'] > 0) {
            $image = "images/" . $file['name'];

            move_uploaded_file($file['tmp_name'], $image);
            //Thêm dữ liệu ảnh vào mảng data
            $data['img_thumbnail'] = $image;
        }
        Product::create($data);
        return redirect('products');
    }


    public function destroy($id)
    {
        $product = Product::find($id);
        Product::delete($id);
        //Xóa ảnh
        if (file_exists($product->img_thumbnail)) {
            unlink($product->img_thumbnail);
        }
        return redirect('products');
    }

    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        return view('edit', compact('product', 'categories'));
    }

    public function update($id)
    {
        $data = $_POST;
        Product::update($data, $id);

        return redirect("products/$id/edit");
    }
}
