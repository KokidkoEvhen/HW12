@extends('layout')

@section('title', 'Категории')

@section('body')
    <h1>Categories</h1>

    <a class="btn btn-primary" href="/categories/create" role="button">Add</a>

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
        @foreach($categories as $category)
            @if($category->title !== 'Uncategorized')
                <tr>
                    <th scope="row">{{ $category->id }}</th>
                    <td>{{ $category->title }}</td>
                    <td>{{ $category->slug }}</td>
                    <td>
                        <a href="/categories/update/{{ $category->id }}">Edit</a> |
                        <a href="/categories/delete/{{ $category->id }}">Delete</a>
                    </td>
                </tr>
            @endif
        @endforeach
        </tbody>
    </table>
@endsection