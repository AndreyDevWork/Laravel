@extends('layuots.main')
@section('content')
    <h1>EDIT POST</h1>
    <form action="{{ route('post.update', $post->id) }}" method="post">
        @csrf
        @method('patch')
        <div class="mb-3">
            <label for="title" class="form-label">TITLE</label>
            <input value="{{ $post->title }}" name="title" type="text" class="form-control" id="title">
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">CONTENT</label>
            <textarea name="content" class="form-control" id="content" rows="3">{{ $post->content }}</textarea>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">IMAGE</label>
            <input value="{{ $post->image }}" name="image" type="text" class="form-control"  id="image">
        </div>
        <button type="submit" class="btn btn-dark">Update</button>
    </form>
@endsection