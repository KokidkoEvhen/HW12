@extends('layout')

@section('title', 'Home page')

@section('body')
    <h1>Homepage</h1>

    <form method="post">
        <input type="submit" class="btn btn-primary" value="Add test data"/>
    </form>
@endsection