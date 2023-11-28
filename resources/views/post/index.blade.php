@extends('layuots.main')
@section('content')
    <h1>Post list</h1>
    <a class="btn btn-dark mb-3" href="{{ route('post.create') }}">Create post</a>
    <div class="wrapper">
        @foreach($posts as $post)
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">{{ $post->title }}</h5>
                    <p class="card-text">{{ $post->content }}</p>
                    <a href="{{ route('post.show', $post->id) }}" class="btn btn-primary">MORE</a>
                    <form action="{{ route('post.delete', $post->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <button class="btn btn-primary">Delete</button>
                    </form>
                    @foreach($post->tags()->get() as $tags)
                        <button type="button" class="btn btn-outline-warning">{{$tags->title}}</button>
                    @endforeach

                </div>
            </div>
        @endforeach
    </div>


@endsection
