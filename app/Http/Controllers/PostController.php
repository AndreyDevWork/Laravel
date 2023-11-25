<?php

namespace App\Http\Controllers;

use App\Models\Post;
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

    function create()
    {
        return view('post.create');
    }
    function store()
    {
        $data = request()->validate([
           'title' => 'string',
           'content' => 'string',
           'image' => 'string',
        ]);
        Post::create($data);
        return redirect()->route('post.index');
    }

    function show(Post $post)
    {
        return view('post.show', [
            'post' => $post
        ]);
    }




    function update()
    {
        $post = Post::find(6);

        $post->update([
            'title' => 'SUPER PUPER STUDIA',
        ]);
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
