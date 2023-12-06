<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\FilterRequest;
use App\Models\Post;

class IndexController extends BaseController
{
    public function __invoke(FilterRequest $request)
    {
        $data = $request->validated();
        $query = Post::query();

        if(isset($data['category_id'])) {
            $query->where('category_id', $data['category_id']);
        };
        $posts = $query->get();
        dd($posts);
//        $posts = Post::paginate(10);
//
//        return view('post.index', [
//            'posts' => $posts,
//        ]);
    }
}
