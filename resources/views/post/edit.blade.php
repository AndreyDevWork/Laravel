@extends('layuots.main')
@section('content')
    <h1>EDIT POST</h1>
    <div class="btn btn-outline-danger"> {{ $post->category->title }}</div>
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
        <div class="mb-3">
            <label for="category_id" class="form-label">CATEGORY</label>
            <select class="form-select" name="category_id" id="category_id" aria-label="Default select example">
                @foreach($categories as $category)
                    <option
                        {{ $category->id == $post->category->id ? 'selected': '' }}
                        value="{{ $category->id }}">{{ $category->title }}
                    </option>
                @endforeach
            </select>
            <div class="mb-3">
                <label for="tags" class="form-label">TAGS</label>
                <select class="form-select" id="tags" name="tags[]" multiple aria-label="Multiple select example">
                    @foreach($tags as $tag)
                        <option
                        @foreach($post->tags as $postTag)
                                {{ $tag->id == $postTag->id ? 'selected': '' }}
                        @endforeach
                        value="{{ $tag->id }}">{{ $tag->title }}
                        </option>
                    @endforeach

                </select>
            </div>
        </div>
        <button type="submit" class="btn btn-dark">Update</button>
    </form>
@endsection
