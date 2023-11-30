<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\PostTag;
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
        $categories = Category::all();
        $tags = Tag::all();
        return view('post.create', [
            'categories' => $categories,
            'tags' => $tags
        ]);
    }

    public function store()
    {
        $data = request()->validate([
            'title' => 'string',
            'content' => 'string',
            'image' => 'string',
            'category_id' => '',
            'tags' => '',
        ]);
        $tags = $data['tags'];
        unset($data['tags']);

        $post = Post::create($data);
        $post->tags()->attach($tags, /*['created_at' => new \DateTime('now')]*/);


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
        $categories = Category::all();
        return view('post.edit', [
            'post' => $post,
            'categories' => $categories
        ]);

    }

    public function update(Post $post)
    {
        $data = request()->validate([
            'title' => 'string',
            'content' => 'string',
            'image' => 'string',
            'category_id' => '',
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
