<div class="card">
    <div class="card-header">
        <h5><a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a></h5>
        <small> by {{ $post->user->name }}</small>
        <small> on <a href="{{ route('categories.show', $post->category) }}">{{ $post->category->name }}</a></small>
        <small> {{ $post->created_at->format('d/m/Y H:i') }}</small>
        @can('update', $post)
            <small><a href="{{ route('posts.edit', $post) }}">[Edit]</a></small>
        @endcan
    </div>
    <div class="card-body">
        {{ $post->preview }}
    </div>
    <div class="card-footer">
        <small>
            #tags: {!! $post->tagLinks() !!}
        </small>
    </div>
</div>
<hr />



