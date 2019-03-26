@extends('layouts.app')

@section('content')

    <h4>Post tagged with <strong>{{ $tag->name }}</strong> ({{ $posts->total() }})</h4>

    @foreach($posts as $post)
        @include('posts._single')
    @endforeach

    {{ $posts->links() }}
@endsection
