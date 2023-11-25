@extends('layuots.main')
@section('content')
    <h1>Post list</h1>
    <div class="wrapper">
        @foreach($posts as $post)
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">{{ $post->title }}</h5>
                    <p class="card-text">{{ $post->content }}</p>
                    <a href="#" class="btn btn-primary">Подробнее</a>
                </div>
            </div>
        @endforeach
    </div>

@endsection
