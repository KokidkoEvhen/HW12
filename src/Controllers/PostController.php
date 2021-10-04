<?php

namespace Hillel\Controllers;

use \Hillel\Models\Post;
use \Hillel\Models\Tag;
use Hillel\Models\Category;

class PostController
{
    public function index()
    {
        $posts = Post::all();

        return view('posts.index', ['posts' => $posts]);
    }

    public function form()
    {
        $data = [];
        $data['tags'] = Tag::all();
        $data['categories'] = Category::all();

        if (!empty($id = request()->route()->parameter('id'))) {
            $data['post'] = Post::with('tags')->find($id);
        }

        return view('posts.form', $data);
    }

    public function create()
    {
        $request = request();

        $post = Post::create([
            'title' => $request->get('title'),
            'slug' => $request->get('slug'),
            'body' => $request->get('body'),
            'category_id' => $request->get('category_id')
        ]);
        $post->tags()->sync($request->get('tags_id'));

        header('Location: /posts');
    }

    public function update()
    {
        $request = request();

        $post = Post::find($request->route()->parameter('id'));
        $post->update([
            'title' => $request->get('title'),
            'slug' => $request->get('slug'),
            'body' => $request->get('body'),
            'category_id' => $request->get('category_id'),
        ]);
        $post->tags()->sync($request->get('tags_id'));

        header('Location: /posts');
    }

    public function delete()
    {
        $post = Post::find(request()->route()->parameter('id'));
        $post->delete();

        header('Location: /posts');
    }
}
