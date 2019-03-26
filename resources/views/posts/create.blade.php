@extends('layouts.app')

@section('content')

    <h4>Create a new article</h4>

    <form action="{{ route('posts.store') }}" method="POST">
        @csrf
        @include('posts._form')

        <button type="submit" class="btn btn-success btn-block">Publish</button>
    </form>

@endsection
