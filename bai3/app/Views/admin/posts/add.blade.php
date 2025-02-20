@extends('admin.dashboard')
@section('title', 'Danh sách bài viết')

@section('content')
    <div class="container w-50">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="" class="label-control">Title</label>
                <input type="text" name="title" value="{{ $data['title'] }}" class="form-control">
                @isset($errors['title'])
                    <span class="text-danger">{{ $errors['title'] }}</span>
                @endisset
            </div>
            <div class="mb-3">
                <label for="" class="label-control">Image</label>
                <input type="file" name="image" id="" class="form-control">
                @isset($errors['image'])
                    <span class="text-danger">{{ $errors['image'] }}</span>
                @endisset
            </div>
            <div class="mb-3">
                <label for="" class="label-control">Description</label>
                <textarea name="description" rows="5" class="form-control">{{ $data['description'] }}</textarea>
                @isset($errors['description'])
                    <span class="text-danger">{{ $errors['description'] }}</span>
                @endisset
            </div>
            <div class="mb-3">
                <label for="" class="label-control">Content</label>
                <textarea name="content" rows="10" class="form-control"></textarea>
            </div>
            <div class="mb-3">
                <label for="" class="label-control">Category Name</label>
                <select name="category_id" id="" class="form-control">
                    @foreach ($categories as $cate)
                        <option value="{{ $cate->id }}">
                            {{ $cate->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Create New</button>
            </div>
        </form>
    </div>
@endsection
