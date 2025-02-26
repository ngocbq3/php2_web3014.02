@extends('layout')

@section('title', 'Thêm mới')

@section('content')
    <div class="container w-75">
        <form action="{{ APP_URL . 'products/store' }}" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="" class="form-label">Name</label>
                <input type="text" name="name" value="{{ $data['name'] ?? '' }}" class="form-control">
                @isset($errors['name'])
                    <span class="text-danger">{{ $errors['name'] }}</span>
                @endisset
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Category Name</label>
                <select name="category_id" id="" class="form-control">
                    @foreach ($categories as $cate)
                        <option value="{{ $cate->id }}">
                            {{ $cate->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Image</label>
                <input type="file" name="img_thumbnail" id="" class="form-control">
                @isset($errors['img_thumbnail'])
                    <span class="text-danger">{{ $errors['img_thumbnail'] }}</span>
                @endisset
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Description</label>
                <textarea name="description" rows="5" class="form-control">{{ $data['description'] ?? '' }}</textarea>
                @isset($errors['description'])
                    <span class="text-danger">{{ $errors['description'] }}</span>
                @endisset
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Create</button>
                <a href="{{ APP_URL . 'products' }}" class="btn btn-primary">List</a>
            </div>
        </form>
    </div>
@endsection
