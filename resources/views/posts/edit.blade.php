@extends('layouts.app')

@section('content')

<h4>Updating '{{ $post->title }}'</h4>

<form action="{{ route('posts.update', $post) }}" method="POST">
    @csrf
    @method('PATCH')

    @include('posts._form')

    <button type="submit" class="btn btn-warning btn-block">Update</button>
</form>

<hr>

@can('delete', $post)
    <form action="{{ route('posts.destroy', $post) }}"  method="POST">
        @csrf
        @method('DELETE')

        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete post</button>
    </form>
@endcan

@endsection
