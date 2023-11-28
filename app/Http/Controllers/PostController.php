<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('post.index', [
            'posts' => $posts,
        ]);
    }

    public function create()
    {
        return view('post.create');
    }

    public function store()
    {
        $data = request()->validate([
            'title' => 'string',
            'content' => 'string',
            'image' => 'string',
        ]);
        Post::create($data);
        return redirect()->route('post.index');
    }

    public function show(Post $post)
    {
        return view('post.show', [
            'post' => $post
        ]);
    }

    public function edit(Post $post)
    {
        return view('post.edit', [
            'post' => $post
        ]);

    }

    public function update(Post $post)
    {
        $data = request()->validate([
            'title' => 'string',
            'content' => 'string',
            'image' => 'string',
        ]);
        $post->update($data);
        return redirect()->route('post.show', $post->id);
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect(route('post.index'));
    }


    public function delete()
    {
        $post = Post::find(7);
        $post->delete();
    }

    public function firstOrCreate()
    {
        $post = Post::find(1);

        $anotherPost = [
            'title' => 'dasdad!Create!!!!',
            'content' => 'Adasdadasdr Post created by php storm',
            'image' => 'iddasdad2',
            'likes' => 210,
            'is_published' => 1
        ];

        $post = Post::firstOrCreate(
            [
                'title' => 'gdsfsfds!',
            ],
            [
                'title' => 'dasdad!Create!!!!',
                'content' => '3333333Adasdadasdr Post created by php storm',
                'image' => 'iddasdad2',
                'likes' => 210,
                'is_published' => 1
            ]
        );
        dump($post->content);
    }

    public function updateOrCreate()
    {
        $anotherPost = [
            'title' => '1',
            'content' => '1',
            'image' => '1',
            'likes' => 0,
            'is_published' => 1
        ];

        $post = Post::updateOrCreate(
            [
                'title' => 'Createe',
            ],
            $anotherPost
        );
    }
}
