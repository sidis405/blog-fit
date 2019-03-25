@extends('layouts.app')

@section('content')

    <h4>Create a new article</h4>

    <form action="{{ route('posts.store') }}" method="POST">

        @csrf

        <div class="form-group">
            <label>Title</label>
            <input type="text" class="form-control" name="title">
        </div>

        <div class="form-group">
            <label>Category</label>
            <select name="category_id" class="form-control">
                <option></option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Preview</label>
            <textarea name="preview" cols="30" rows="2" class="form-control"></textarea>
        </div>

        <div class="form-group">
            <label>Body</label>
            <textarea name="body" cols="30" rows="4" class="form-control"></textarea>
        </div>

        <div class="form-group">
            <label>Tags</label>
            <select name="tags[]" class="form-control" multiple="">
                @foreach($tags as $tag)
                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success btn-block">Publish</button>
    </form>

@endsection
