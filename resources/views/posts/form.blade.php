@extends('layout')

@section('title', 'Посты')

@section('body')
    <form method="post">
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" class="form-control" id="title"
                   @isset($post) value="{{ $post->title }}" @endisset>
        </div>
        <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" name="slug" class="form-control" id="slug"
                   @isset($post) value="{{ $post->slug }}" @endisset>
        </div>
        <div class="mb-3">
            <label for="body" class="form-label">Body</label>
            <input type="text" name="body" class="form-control" id="body"
                   @isset($post) value="{{ $post->body }}" @endisset>
        </div>

        <div class="container">
            <div class="row">
                <div class="col">
                    @foreach($categories as $category)
                        <div class="mb-3">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="category_id" id="category_id"
                                       value="{{ $category->id }}"
                                       @isset($post->category_id)
                                       @if($post->category_id == $category->id) checked @endif
                                        @endisset>
                                <label class="form-check-label" for="category_id">{{ $category->title }}</label>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="col">
                    @foreach($tags as $tag)
                        <div class="mb-3">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="tags_id[]" id="tags_id"
                                       value="{{ $tag->id }}"
                                       @isset($post->category_id)
                                       @foreach($post->tags as $post_tag)
                                       @if($post_tag->id == $tag->id) checked @endif
                                        @endforeach
                                        @endisset>
                                <label class="form-check-label" for="tags_id">{{ $tag->title }}</label>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>

        @isset($post)
            <input type="hidden" name="id" value="{{ $post->id }}">
        @endisset

        <input type="submit" class="btn btn-primary" value="Save"/>
    </form>
@endsection