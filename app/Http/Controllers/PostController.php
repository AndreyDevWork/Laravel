<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $post = Post::find(1);
        $postWhere = Post::firstWhere('title', 'Рецепт изысканной кухни');
        $postsMore = Post::where('id', '>', 5)->where('id', '<', 8)->get();
        $allPostsLimit = Post::take(4)->get();
        dump($post);
        dump($postWhere);
        dump($postsMore);
        dump($allPostsLimit);
    }


    function create()
    {
        $postsArr = [
            [
                'title' => 'Create',
                'content' => 'Post created by php storm',
                'image' => 'img 1',
                'likes' => 20,
                'is_published' => 1
            ],
            [
                'title' => '!!!!Create!!!!',
                'content' => 'Another Post created by php storm',
                'image' => 'img 2',
                'likes' => 21,
                'is_published' => 1
            ]
        ];

        Post::create(
            [
                'title' => '!!!!Create!!!!',
                'content' => 'Another Post created by php storm',
                'image' => 'img 2',
                'likes' => 21,
                'is_published' => 1
            ],
        );
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
