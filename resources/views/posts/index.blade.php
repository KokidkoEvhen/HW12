@extends('layout')

@section('title', 'Посты')

@section('body')
    <h1>Posts</h1>

    <a class="btn btn-primary" href="/posts/form" role="button">Add</a>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Slug</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($posts as $post)
            <tr>
                <th scope="row">{{ $post->id }}</th>
                <td>{{ $post->title }}</td>
                <td>{{ $post->slug }}</td>
                <td>
                    <a href="/posts/form/{{ $post->id }}">Edit</a> |
                    <a href="/posts/delete/{{ $post->id }}">Delete</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection