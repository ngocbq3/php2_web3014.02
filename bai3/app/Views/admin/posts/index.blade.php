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
                        <a href="add" class="btn btn-primary">Create</a>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <th scope="row">{{ $post->id }}</th>
                        <td>{{ $post->title }}/td>
                        <td>
                            <img src="{{ $post->image }}" width="90" alt="">
                        </td>
                        <td>{{ $post->name }}</td>
                        <td>{{ $post->created_at }}</td>
                        <td>
                            Edit | Delete
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
