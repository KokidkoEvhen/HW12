@extends('layout')

@section('title', 'Тэги')

@section('body')
    <h1>Tags</h1>

    <a class="btn btn-primary" href="form.php" role="button">Add</a>

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
        @foreach($tags as $tag)
            <tr>
                <th scope="row">{{ $tag->id }}</th>
                <td>{{ $tag->title }}</td>
                <td>{{ $tag->slug }}</td>
                <td>
                    <a href="form.php?id={{ $tag->id }}">Edit</a> |
                    <a href="delete.php?id={{ $tag->id }}">Delete</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection