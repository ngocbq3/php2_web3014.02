@extends('layout')

@section('title', 'Cập nhật')

@section('content')
    <div class="container w-75">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="" class="form-label">Name</label>
                <input type="text" name="name" value="{{ $product->name }}" class="form-control">
                @isset($errors['name'])
                    <span class="text-danger">{{ $errors['name'] }}</span>
                @endisset
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Category Name</label>
                <select name="category_id" id="" class="form-control">
                    @foreach ($categories as $cate)
                        <option value="{{ $cate->id }}" @selected($cate->id == $product->category_id)>
                            {{ $cate->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Image</label> <br>
                <img src="{{ APP_URL . $product->img_thumbnail }}" width="80" alt="">
                <input type="file" name="img_thumbnail" id="" class="form-control">
                @isset($errors['img_thumbnail'])
                    <span class="text-danger">{{ $errors['img_thumbnail'] }}</span>
                @endisset
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Description</label>
                <textarea name="description" rows="5" class="form-control">{{ $product->description }}</textarea>
                @isset($errors['description'])
                    <span class="text-danger">{{ $errors['description'] }}</span>
                @endisset
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ APP_URL . 'products' }}" class="btn btn-primary">List</a>
            </div>
        </form>
    </div>
@endsection
