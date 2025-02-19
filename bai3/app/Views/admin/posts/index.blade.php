@extends('admin.dashboard')
@section('title', 'Danh sách bài viết')

@section('content')
    <div class="container w-75">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#ID</th>
                    <th scope="col">Title</th>
                    <th scope="col">Image</th>
                    <th scope="col">Category Name</th>
                    <th scope="col">Created at</th>
                    <th scope="col">
                        <a href="{{ APP_URL . 'admin/posts/add' }}" class="btn btn-primary">Create</a>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <th scope="row">{{ $post->id }}</th>
                        <td>{{ $post->title }}</td>
                        <td>
                            <img src="{{ APP_URL . $post->image }}" width="90" alt="">
                        </td>
                        <td>{{ $post->name }}</td>
                        <td>{{ $post->created_at }}</td>
                        <td>
                            <a href="{{ APP_URL . '/admin/posts/edit/' . $post->id }}" class="btn btn-primary">Edit</a>
                            <form action="{{ APP_URL . 'admin/posts/delete/' . $post->id }}" method="post">
                                <button onclick="return confirm('Bạn có muốn xóa không')" type="submit"
                                    class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
