<?php

namespace Hillel\Controllers;

use \Hillel\Models\Tag;

class TagController
{
    public function index()
    {
        $tags = Tag::all();

        return view('tags.index', ['tags' => $tags]);
    }

    public function form()
    {
        $data = [];

        if (!empty($id = request()->route()->parameter('id'))) {
            $data['tag'] = Tag::find($id);
        }

        return view('tags.form', $data);
    }

    public function create()
    {
        Tag::create([
            'title' => request()->get('title'),
            'slug' => request()->get('slug'),
        ]);

        header('Location: /tags');
    }

    public function update()
    {
        $request = request();

        $post = Tag::find($request->route()->parameter('id'));
        $post->update([
            'title' => $request->get('title'),
            'slug' => $request->get('slug')
        ]);

        header('Location: /tags');
    }

    public function delete()
    {
        $post = Tag::find(request()->route()->parameter('id'));
        $post->delete();

        header('Location: /tags');
    }
}
