@extends('admin.dashboard')
@section('title', 'Sửa bài viết')

@section('content')
    <div class="container w-50">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="" class="label-control">Title</label>
                <input type="text" name="title" value="{{ $post->title }}" class="form-control">
            </div>
            <div class="mb-3">
                <label for="" class="label-control">Image</label>
                <input type="file" name="image" id="" class="form-control">
            </div>
            <div class="mb-3">
                <label for="" class="label-control">Description</label>
                <textarea name="description" rows="5" class="form-control"></textarea>
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
