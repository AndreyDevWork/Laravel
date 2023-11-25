@extends('layuots.main')
@section('content')
    <h1>CREATE POST</h1>
    <form action="{{ route('post.store') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">TITLE</label>
            <input name="title" type="text" class="form-control" id="title">
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">CONTENT</label>
            <textarea name="content" class="form-control" id="content" rows="3"></textarea>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">IMAGE</label>
            <input name="image" type="text" class="form-control"  id="image">
        </div>
        <button type="submit" class="btn btn-dark">CREATE</button>
    </form>
@endsection
