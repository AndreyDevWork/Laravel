@extends('layuots.main')
@section('content')
    <h1>Post list</h1>
    <div class="wrapper">
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">{{ $post->title }}</h5>
                <p class="card-text">{{ $post->content }}</p>
                <div>Likes {{ $post->likes }}</div>
                <div>Created at {{ $post->created_at }}</div>
                <div>Updated at {{ $post->updated_at }}</div>
            </div>
            <a class="btn btn-dark" href="{{ route('post.index') }}">Back</a>
            <a class="btn btn-dark" href="{{ route('post.edit', $post->id) }}">Edit</a>
        </div>
    </div>

@endsection
